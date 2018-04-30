@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Titres</h3>
          <p class="animated fadeInDown">
            <a href="/titres">Titres</a> <span class="fa-angle-right fa"></span> Liste
          </p>
      </div>
      <div class="col-md-2">
        <div class="add-new-btn-wrapper">
          <a href="/titres/create" class="btn btn-primary">Nouveau titre</a>
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
  <div class="col-md-12 text-center">
        @if(count($titres) > 0)
            @foreach($titres as $titre)
              <div class="col-md-2" style="background-color:#fff;margin:15px;padding:20px;">
                <div class="round-initial-letter" style="background:#ededed;color:#ccc;width:80px;height:80px;border-radius:50%;padding: 8px 10px;margin:20px auto;font-size: 45px;">
                    {{str_limit($titre->nom, $limit =  1, $end = '')}}
                </div>
                <h3 class="titre-nom">
                    {{$titre->nom}}
                </h3>
              </div>
            @endforeach
        @else
          Aucun titre enregistré
        @endif
  </div>
</div>
@endsection
