@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Membres</h3>
          <p class="animated fadeInDown">
            <a href="/membres">Membres</a> <span class="fa-angle-right fa"></span> liste
          </p>
      </div>
      <div class="col-md-2">
        <div class="add-new-btn-wrapper">
          <a href="/membres/create" class="btn btn-primary">Nouveau</a>
        </div>
      </div>
    </div>
</div>

<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    @include('inc.messages')
  </div>
</div>

<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    @if(count($membres) > 0)
      <div class="panel">
        <div class="panel-heading"><h3>Liste</h3></div>
        <div class="panel-body">
          <div class="responsive-table">
                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>
                        Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prénoms
                      </th>
                      <th>
                        Genre
                      </th>
                      <th>
                        Titre
                      </th>
                      <th>
                        Commune
                      </th>
                      <th>
                        Quartier
                      </th>
                      <th>
                        Contact
                      </th>
                      <th>
                        Action
                      </th>
                    </tr>
                  </thead>
          <tbody>
            @foreach($membres as $membre)
              <tr>
                <td><a href="/membres/{{$membre->id}}/edit">{{$membre->matricule}}</a></td>
                <td>{{$membre->nom}}</td>
                <td>{{$membre->prenom}}</td>
                <td>{{$membre->genre}}</td>
                <td>{{$membre->titre->nom}}</td>
                <td>{{$membre->quartier->commune->nom}}</td>
                <td>{{$membre->quartier->nom}}</td>
                <td>{{$membre->contact}}</td>
                <td> <a href="/membres/{{$membre->id}}/dimes">Voir dimes</a> </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div class=" text-center">
        Aucun membre enregistré
    </div>
  @endif
</div>
</div>
@endsection

@section('script')
<script src="/js/plugins/jquery.datatables.min.js"></script>
<script src="/js/plugins/datatables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
@endsection
