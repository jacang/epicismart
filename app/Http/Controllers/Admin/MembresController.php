<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Membre;
use App\Titre;
use App\Commune;
use App\Quartier;
use App\Dime;

class MembresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membres = Membre::with('Titre')->paginate(15);
        return view('membres.index')->with('membres', $membres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titres = Titre::all();
        $communes = Commune::all();
        $quartiers = Quartier::all();

        $data = [
          'titres'    =>  $titres,
          'communes'  =>  $communes,
          'quartiers' =>  $quartiers
        ];
        return view('membres.create', compact('titres', 'communes', 'quartiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
          'nom' => 'required',
        ]);

        $filenameToStore = "default_photo.png";
        if($request->file('photo') != null){
            // Get filename with extention
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            // Get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('photo')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Uploade image
            $path = $request->file('photo')->storeAs('public/membre_photos', $filenameToStore);
        }

        // Create new Membre
        $membre = new Membre;
        $membre->nom = $request->input('nom');
        $membre->prenom = $request->input('prenom');
        $membre->matricule = $request->input('matricule');
        $membre->genre = $request->input('genre');
        $membre->quartier_id = $request->input('quartier_id');
        $membre->titre_id = $request->input('titre_id');
        $membre->contact = $request->input('contact');
        $membre->information = $request->input('information');

        $membre->photo = $filenameToStore;

        // Save Membre
        $membre->save();

        // Redirect
        return redirect('/membres')->with('success', 'Membre créée avec succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membre = Membre::find($id);

        return view('membres.show')->with('membre', $membre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membre = Membre::with('Titre', 'Quartier')->find($id);

        $titres    = Titre::all();
        $communes  = Commune::all();
        $quartiers = Quartier::all();

        $data = [
          'membre'    =>  $membre,
          'titres'    =>  $titres,
          'communes'  =>  $communes,
          'quartiers' =>  $quartiers
        ];
        return view('membres.edit', compact('membre', 'titres', 'communes', 'quartiers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'nom' => 'required',
        ]);

        $membre = Membre::find($id);

        $membre->nom = $request->input('nom');
        $membre->prenom = $request->input('prenom');
        $membre->matricule = $request->input('matricule');
        $membre->genre = $request->input('genre');
        $membre->quartier_id = $request->input('quartier_id');
        $membre->titre_id = $request->input('titre_id');
        $membre->contact = $request->input('contact');
        $membre->information = $request->input('information');

        if($request->hasFile('photo')){
            // Get filename with extention
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            // Get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('photo')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Uploade image
            $path = $request->file('photo')->storeAs('public/membre_photos', $filenameToStore);

            $membre->photo = $filenameToStore;
        }else{
            if(!$membre->photo){
                $filenameToStore = "default_photo.png";
                $membre->photo = $filenameToStore;
            }
        }

        // Save Membre
        $membre->save();

        // Redirect
        return redirect('/membres/'.$membre->id)->with('success', 'Membre modifié avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMembreDimes($mid){

        $dimes = Dime::select('*')
        ->where('membre_id', '=', $mid)
        ->get();

        return view('membres.membreDime', [
          'dimes' => $dimes,
        ]);
    }
}
