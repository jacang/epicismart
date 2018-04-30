@extends('layouts.base')

@section('content')
  <div class="panel box-shadow-none content-header">
      <div class="panel-body">
        <div class="col-md-9">
            <h3 class="animated fadeInLeft">Communes</h3>
            <p class="animated fadeInDown">
              <a href="/communes">Communes</a> <span class="fa-angle-right fa"></span> {{$commune->nom}}
            </p>
        </div>
        <div class="col-md-3">
          <div class="add-new-btn-wrapper">
            <a href="/quartiers/create/{{$commune->id}}" class="btn btn-primary">Ajouter un nouveau quartier</a>
          </div>
        </div>
      </div>
  </div>

  <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      @include('inc.messages')
    </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-12 padding-0">

      <div class="col-md-7">
          <div class="panel">
              <div class="panel-heading">
                <h4>Quartiers de {{$commune->nom}}</h4>
              </div>

              <div class="panel-body" style="padding-bottom:30px;">
                    @if(count($commune->quartiers) > 0)
                      <?php
                        $colcount = count($commune->quartiers);
                        $i = 1;
                      ?>
                      <div id="quartiers" class="list">
                          @foreach($commune->quartiers as $quartier)
                              <div class="list-item">
                                {{$quartier->nom}}
                              </div>
                          @endforeach
                      </div>
                    @else
                      <p>Aucun quartier disponible</p>
                    @endif

              </div>
          </div>
      </div>

      <div class="col-md-5">
          <div class="panel box-v2">
              <div class="panel-heading bg-white border-none padding-0">
                  <a href="/communes/{{$commune->id}}">
                    <img class="img-align" src="/storage/commune_images/{{$commune->image}}" alt="">
                    <div class="box-v2-detail">
                      <h4>{{ $commune->nom }}</h4>
                    </div>
                  </a>
              </div>
              <div class="panel-body">
                  <div class="col-md-12 padding-0 text-center">
                    <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                        <h3>100</h3>
                        <p>Fidèles</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                        <h3>40</h3>
                        <p>Hommes</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                        <h3>60</h3>
                        <p>Femmes</p>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
