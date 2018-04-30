@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Membres</h3>
          <p class="animated fadeInDown">
            <a href="/membres">Membres</a> <span class="fa-angle-right fa"></span> modifier
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
          <h4>Formulaire de modification</h4>
        </div>

        <div class="panel-body" style="padding-bottom:30px;">
            <div class="col-md-12">

                {!!Form::model($membre, ['route' => ['membres.update', $membre->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'cmxform'])!!}

                <div class="col-md-4">
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <div class="membre-photo-wrapper">
                          <img class="img-align" src="/storage/membre_photos/{{$membre->photo}}" alt="{{$membre->nom.' '.$membre->prenom}}">
                          {{Form::file('photo')}}
                      </div>

                  </div>
                </div>

                <div class="col-md-8">
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('matricule', null, ['class' => 'form-text', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                    <label>Matricule du membre</label>
                  </div>

                  <div class="form-group ">
                    <div class="row">
                        <div class="col-md-6">
                          <select class="select2-A" id="genre" name="genre">
                              @php($selectedGenre = $membre->genre)
                              <option value="">Choisir un genre</option>
                              <option @if($selectedGenre == "H") selected='selected' @endif value="H">Homme</option>
                              <option @if($selectedGenre == "F") selected='selected' @endif value="F">Femme</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <select class="select2-A" id="titre_id" name="titre_id">
                              @if(count($titres) > 0)
                                  <option value="">Choisir un titre</option>
                                @foreach($titres as $titre)
                                  @php($titreId = $titre->id)
                                  @php($selectedTitre = $membre->titre->id)
                                  <option @if($titreId == $selectedTitre) selected='selected' @endif value="{{$titre->id}}">{{$titre->nom}}</option>
                                @endforeach
                              @else
                                  <option value="">Aucun titre disponible</option>
                              @endif
                          </select>
                        </div>
                    </div>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('nom', null, ['class' => 'form-text', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                    <label>Nom du membre</label>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('prenom', null, ['class' => 'form-text', 'aria-required' => 'true'])}}
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
                                    @php($communeId = $commune->id)
                                    @php($selectedCommune = $membre->quartier->commune_id)
                                    <option @if($communeId == $selectedCommune) selected='selected' @endif value="{{$commune->id}}">{{$commune->nom}}</option>
                                  @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                          <select class="select2-A" id="quartier_id" name="quartier_id">
                              @if(count($quartiers) > 0)
                                @foreach($quartiers as $quartier)
                                  @php($quartierId = $quartier->id)
                                  @php($selectedQuartier = $membre->quartier->id)
                                  <option @if($quartierId == $selectedQuartier) selected='selected' @endif value="{{$quartier->id}}">{{$quartier->nom}}</option>
                                @endforeach
                              @endif
                          </select>
                        </div>
                    </div>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('contact', null, ['class' => 'form-text'])}}
                    <span class="bar"></span>
                    <label><span class="fa fa-mobile"></span> Contact</label>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::textarea('information', null, ['class' => 'form-textarea', 'placeholder' => 'Autres informations', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                  </div>

                </div>

                <div class="col-md-12 text-right">
                  <div class="col-md-8"></div>
                  <div class="col-md-4">
                      <div class="col-md-6">
                          <a href="/membres" class="btn btn-danger">Annuler</a>
                      </div>
                      <div class="col-md-6">
                          {{ Form::submit('Modifier', ['class' => 'submit btn btn-primary'])}}
                      </div>
                  </div>
              </div>
            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
</div>
@endsection
