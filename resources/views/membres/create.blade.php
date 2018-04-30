@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Membres</h3>
          <p class="animated fadeInDown">
            <a href="/membres">Membres</a> <span class="fa-angle-right fa"></span> créer
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

                {!!Form::open(['action' => 'MembresController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'cmxform'])!!}
                <div class="col-md-6">
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('matricule', '', ['class' => 'form-text', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                    <label>Matricule du membre</label>
                  </div>

                  <div class="form-group ">
                    <div class="row">
                        <div class="col-md-6">
                          <select class="select2-A" id="genre" name="genre">
                              <option value="">Choisir un genre</option>
                              <option value="H">Homme</option>
                              <option value="F">Femme</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <select class="select2-A" id="titre_id" name="titre_id">
                              @if(count($titres) > 0)
                                  <option value="">Choisir un titre</option>
                                @foreach($titres as $titre)
                                  <option value="{{$titre->id}}">{{$titre->nom}}</option>
                                @endforeach
                              @else
                                  <option value="">Aucun titre disponible</option>
                              @endif
                          </select>
                        </div>
                    </div>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('nom', '', ['class' => 'form-text', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                    <label>Nom du membre</label>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('prenom', '', ['class' => 'form-text', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                    <label>Prénoms du membre</label>
                  </div>

                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="select2-A" id="commune_id" name="commune_id">
                                @if(count($communes) > 0)
                                    <option value="">Choisir une commune</option>
                                  @foreach($communes as $commune)
                                    <option value="{{$commune->id}}">{{$commune->nom}}</option>
                                  @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                          <select class="select2-A" id="quartier_id" name="quartier_id">
                              @if(count($quartiers) > 0)
                                @foreach($quartiers as $quartier)
                                  <option value="{{$quartier->id}}">{{$quartier->nom}}</option>
                                @endforeach
                              @endif
                          </select>
                        </div>
                    </div>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('contact', '', ['class' => 'form-text'])}}
                    <span class="bar"></span>
                    <label><span class="fa fa-mobile"></span> Contact</label>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::textarea('information', '', ['class' => 'form-textarea', 'placeholder' => 'Autres informations', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                  </div>

                </div>

                <div class="col-md-6">
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      {{Form::file('photo')}}
                  </div>
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
