<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use View;
use App\Membre;
use App\Dime;
use App\Titre;

class DimesController extends Controller
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
        $dimes = Dime::with('Membre')->paginate(15);
        $titres = Titre::all();
        return view('dimes.index', [
          'dimes' =>$dimes,
          'titres' =>$titres,
          'dimeresume' => $this->dimeResume()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dimes.create');
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
          'montant' => 'required',
          'membre_id' => 'required',
          'date' => 'required'
        ]);

        $date = date("Y-m-d", strtotime($request->input('date')));

        $dime = new Dime;
        $dime->date = $date;
        $dime->montant = $request->input('montant');
        $dime->membre_id = $request->input('membre_id');

        $dime->save();

        // Redirect
        return redirect('/dimes')->with('success', 'Dîme enregistrée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    /**
     * Search Matricule and send response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchMatriculeResponse(Request $request){
        $query = $request->get('term','');
        $membres=\DB::table('membres');
        $membres->where('matricule','LIKE','%'.$query.'%');
        $membres=$membres->get();
        $data=array();
        foreach ($membres as $membre) {
                $data[]=array('id'=>$membre->id, 'nom'=>$membre->nom,'prenom'=>$membre->prenom, 'matricule'=>$membre->matricule);
        }
        if(count($data))
             return $data;
        else
            return ['id'=>'', 'nom'=>'', 'prenom'=>'', 'matricule'=>''];
    }

    /**
     * Search Matricule and send response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $titres = Titre::all();

        $montantStart = $request->montantStart;
        $montantEnd = $request->montantEnd;
        $dateStart = $request->dateStart;
        $dateEnd = $request->dateEnd;
        $matricule = $request->matricule;
        $titre = $request->titre;

        $dateStart = str_replace('/', '-', $dateStart);
        $dateStart = date('Y-m-d', strtotime($dateStart));

        $dateEnd = str_replace('/', '-', $dateEnd);
        $dateEnd = date('Y-m-d', strtotime($dateEnd));

        $membres = Membre::select('*')
        ->join('dimes', 'dimes.membre_id', '=', 'membres.id')
        ->whereBetween('dimes.date', [$dateStart, $dateEnd]);
        if($montantStart != "" && $montantEnd != ""){
          $membres = $membres->whereBetween('dimes.montant', [intval($montantStart), intval($montantEnd)]);
        }
        if($matricule != ""){
          $membres = $membres->where('membres.matricule','LIKE','%'.$matricule.'%');
        }
        if($titre != ""){
          $membres = $membres->where('membres.titre_id','=',$titre);
        }
        $membres = $membres->get();

        //return count($dimeMembres);
        $msg = "This is a message";

        $view = View::make('dimes.dime-search-response', ['membres' => $membres]);
        $contents = $view->render();
        //return response()->json(array('contents'=> $contents), 200);

        return view('dimes.search-response', [
            'membres' => $membres,
            'titres' => $titres,
            'dimeresume' => $this->dimeResume()
          ]);
    }

    public function dimeResume(){
      $dimeResumeResult = array();

      $dimeMoisEnCours = \ DB::table('dimes')
      ->where('date','LIKE','%'.date('Y-m').'%')
      ->sum('montant');
      $dimeResumeResult['dimeMoisEnCours'] = $dimeMoisEnCours;

      $dimeMoisPrecedent = \ DB::table('dimes')
      ->where('date','LIKE','%'.date('Y-m',strtotime("-1 month")).'%')
      ->sum('montant');
      $dimeResumeResult['dimeMoisPrecedent'] = $dimeMoisPrecedent;

      $dimeResumeResult['dimeVariation'] = $dimeMoisEnCours - $dimeMoisPrecedent;

      return $dimeResumeResult;
    }

    public function dimeQueryResume($query){
      $dimeResumeResult = array();

      $dimeMoisEnCours = $query->where('dimes.date','LIKE','%'.date('Y-m').'%')
      ->sum('montant');
      $dimeResumeResult['dimeMoisEnCours'] = $dimeMoisEnCours;

      $dimeMoisPrecedent = $query->where('dimes.date','LIKE','%'.date('Y-m',strtotime("-1 month")).'%')
      ->sum('montant');
      $dimeResumeResult['dimeMoisPrecedent'] = $dimeMoisPrecedent;

      $dimeResumeResult['dimeVariation'] = $dimeMoisEnCours - $dimeMoisPrecedent;

      return $dimeResumeResult;
    }
}
