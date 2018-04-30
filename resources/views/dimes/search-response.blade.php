@extends('layouts.base')

@section('style')
  <link rel="stylesheet" type="text/css" href="/css/plugins/daterangepicker.css"/>
@endsection

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Dîmes</h3>
          <p class="animated fadeInDown">
            <a href="/dimes">Dîmes</a> <span class="fa-angle-right fa"></span> liste
          </p>
      </div>
      <div class="col-md-2">
        <div class="add-new-btn-wrapper">
          <a href="/dimes/create" class="btn btn-primary">Ajouter dîme</a>
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
    <div class="panel">
      <div class="panel-heading"><h4>Recherche</h4></div>
      <div class="panel-body">
          @include('dimes.formulaire-recherche')
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading"><h4>Résumé</h4></div>
      <div class="panel-body">
        @include('dimes.dime-resume')
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    @if(count($membres) > 0)
      <div class="panel">
        <div class="panel-heading"><h3>Liste</h3></div>
        <div class="panel-body list-panel-body">
          <div class="responsive-table">
              <table id="datatables-example" class="table table-striped table-bordered">
                  <thead>
                    <t>
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
                        Titre
                      </th>
                      <th>
                        Montant
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Contact
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($membres as $membre)
                      <tr>
                        <td>{{$membre->matricule}}</td>
                        <td>{{$membre->nom}}</td>
                        <td>{{$membre->prenom}}</td>
                        <td>{{$membre->titre->nom}}</td>
                        <td>{{$membre->montant}}</td>
                        <td>{{date('d-m-Y', strtotime($membre->date))}}</td>
                        <td>{{$membre->contact}}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  @else
    <div class=" text-center">
        Aucune resultat trouvé pour cette recherche
    </div>
  @endif
</div>
</div>
@endsection

@section('script')
<script src="/js/plugins/moment.min.js"></script>
<script src="/js/plugins/daterangepicker.js"></script>
<script src="/js/plugins/jquery.datatables.min.js"></script>
<script src="/js/plugins/datatables.bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
      $('#datatables-example').DataTable();

      var start = moment().subtract(1, 'month');

      $('.dateAnimateStart').daterangepicker({
          singleDatePicker: true,
          startDate: start,
          locale: {
            format: 'DD/MM/YYYY'
          }

      });

      $('.dateAnimateEnd').daterangepicker({
          singleDatePicker: true,
          locale: {
            format: 'DD/MM/YYYY'
          },
          maxDate: moment(),
      });

      //autocomplete script
    $('body').on('focus','.autocomplete_txt',function(){
         $(this).autocomplete({
             minLength: 0,
             source: function( request, response ) {
                  $.ajax({
                      url: "{{ route('searchMatricule') }}",
                      dataType: "json",
                      data: {
                          term : request.term,
                      },
                      success: function(data) {
                          var array = $.map(data, function (item) {
                             return {
                                 label: item['matricule'],
                                 value: item['matricule'],
                                 data : item
                             }
                         });
                          response(array)
                      }
                  });
             },
             select: function( event, ui ) {
                 var data = ui.item.data;
                 /*id_arr = $(this).attr('id');
                 id = id_arr.split("_");
                 elementId = id[id.length-1];*/
                 $('#matricule').val(data.matricule);
                 $('#membre_id').val(data.id);
             }
         });
      });
  });
</script>
@endsection
