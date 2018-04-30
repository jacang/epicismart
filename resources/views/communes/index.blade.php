@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Communes</h3>
          <p class="animated fadeInDown">
            <a href="/communes">Communes</a> <span class="fa-angle-right fa"></span> liste
          </p>
      </div>
      <div class="col-md-2">
        <div class="add-new-btn-wrapper">
          <a href="/communes/create" class="btn btn-primary">Nouvelle commune</a>
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
    @if(count($communes) > 0)
    @foreach($communes as $commune)
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel box-v2">
          <div class="panel-heading bg-white border-none padding-0">
              <a href="/communes/{{$commune->id}}">
                <img class="img-align" src="storage/commune_images/{{$commune->image}}" alt="">
                <div class="box-v2-detail">
                  <h4>{{ $commune->nom }}</h4>
                </div>
              </a>
          </div>
          <div class="panel-body">
              <div class="col-md-12 padding-0 text-center">
                <div class="col-md-3 col-sm-3 col-xs-6 padding-0">
                    @php($more = "")
                    @if(count($commune->quartiers) > 1)
                      @php($more = "s")
                    @endif
                    <h3>{{count($commune->quartiers)}}</h3>
                    <p>Quartier{{$more}}</p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 padding-0">
                    @php($countMembre = 0)
                    @php($more = "")

                    @foreach($commune->quartiers as $quartier)
                      @php($countMembre += count($quartier->membres))
                    @endforeach
                    @if($countMembre > 1)
                      @php($more = "s")
                    @endif
                    <h3>{{$countMembre}}</h3>
                    <p>Fidèle{{$more}}</p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 padding-0">
                    <h3>40</h3>
                    <p>Hommes</p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 padding-0">
                    <h3>60</h3>
                    <p>Femmes</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    @endforeach
    @else
      <div class=" text-center">
          Aucune commune enregistrée
      </div>
    @endif
  </div>
</div>
@endsection
