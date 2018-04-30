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
            <a href="/dimes">Dîmes</a> <span class="fa-angle-right fa"></span> créer
          </p>
      </div>
      <div class="col-md-2">

      </div>
    </div>
</div>

<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading">
          <h4>Formulaire de création</h4>
        </div>

        <div class="panel-body" style="padding-bottom:30px;">
            <div class="col-md-12">

                {!!Form::open(['action' => 'DimesController@store', 'method' => 'POST', 'class' => 'cmxform'])!!}
                <div class="col-md-6">
                  <div class="form-group form-animate-text">
                    <input type="text" class="form-text dateAnimate" name="date" id="date" value="{{date('d-m-Y')}}" required>
                    <span class="bar"></span>
                    <label><span class="fa fa-calendar"></span> Date</label>
                  </div>
                  <div class="form-group form-animate-text">
                    <input type="text" class="form-text autocomplete_txt" id="matricule" name="matricule">
                    <input type="hidden" id="membre_id" name="membre_id">
                    <span class="bar"></span>
                    <label><span class="fa fa-calendar"></span> Matricule</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('montant', '', ['class' => 'form-text', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                    <label>Montant de la dîme</label>
                  </div>
                </div>

                <div class="col-md-6">

                </div>
                <div class="col-md-12">
                  {{ Form::submit('submit', ['class' => 'submit btn btn-primary'])}}
              </div>
            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
  <script src="/js/plugins/moment.min.js"></script>
  <script src="/js/plugins/daterangepicker.js"></script>
  <!-- script src="/js/plugins/bootstrap-material-datetimepicker.js"></script -->
  <script type="text/javascript">

    $(document).ready(function(){
        /*$('.dateAnimate').bootstrapMaterialDatePicker({
            format : 'DD/MM/YYYY',
            weekStart : 0,
            lang : 'fr',
            time: false,
            animation:true
        });*/

        var start = moment();

        $('.dateAnimate').daterangepicker({
            singleDatePicker: true,
            startDate: start,
            locale: {
              format: 'DD-MM-YYYY'
            }

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
