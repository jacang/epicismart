@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Membres</h3>
          <p class="animated fadeInDown">
            <a href="/membres">Membres</a> <span class="fa-angle-right fa"></span> dimes
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
<div class="col-md-12 top-20">
    <div class="panel">
         <div class="panel-heading-white panel-heading">
            <h4>Line Chart</h4>
          </div>
          <div class="panel-body">
              <div class="col-md-12">
                <canvas class="line-chart"></canvas>
              </div>
          </div>
    </div>
</div>
<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    @if(count($dimes) > 0)
      <div class="panel">
        <div class="panel-heading"><h3>Liste</h3></div>
        <div class="panel-body">
          <div class="responsive-table">
                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>
                        Date
                      </th>
                      <th>
                        Montant
                      </th>
                    </tr>
                  </thead>
          <tbody>
            @php($dimeParMois = '')
            @php($mois = "")
            @php($moisDime = [
                '01'=> 0,
                '02'=> 0,
                '03'=> 0,
                '04'=> 0,
                '05'=> 0,
                '06'=> 0,
                '07'=> 0,
                '08'=> 0,
                '09'=> 0,
                '10'=> 0,
                '11'=> 0,
                '12'=> 0])

            @foreach($dimes as $dime)
              @php($mois = date('m', strtotime($dime->date)))
              @php($moisDime[$mois] = $moisDime[$mois] + $dime->montant)
              <tr>
                <td>{{date('d-m-Y', strtotime($dime->date))}} </td>
                <td>{{$dime->montant}}</td>
              </tr>
            @endforeach

          </tbody>
        </table>

        @php($dimeParMois = $moisDime['01'].','.$moisDime['02'].','.$moisDime['03'].','.$moisDime['04'].','.$moisDime['05'].','.$moisDime['06'].','.$moisDime['07'].','.$moisDime['08'].','.$moisDime['09'].','.$moisDime['10'].','.$moisDime['11'].','.$moisDime['12'])

      </div>
    </div>
  @else
    <div class=" text-center">
        Aucune dime enregistrée
    </div>
  @endif
</div>
</div>
@endsection
@section('script')
<script src="/js/plugins/jquery.datatables.min.js"></script>
<script src="/js/plugins/datatables.bootstrap.min.js"></script>
<script src="/js/plugins/chart.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();

    var lineChartData = {
        labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(21,186,103,0.5)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [{{$dimeParMois}}]
            }
        ]
    };

    window.onload = function(){
        var ctx3 = $(".line-chart")[0].getContext("2d");
        window.myLine = new Chart(ctx3).Line(lineChartData, {
            responsive : true,
            showTooltips: true
        });
    };
  });
</script>
@endsection
