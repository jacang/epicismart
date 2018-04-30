@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Quartiers</h3>
          <p class="animated fadeInDown">
            <a href="/communes/{{$selectedCommune}}">Communes</a> <span class="fa-angle-right fa"></span> <a href="/quartiers">Quartiers</a> <span class="fa-angle-right fa"></span> créer
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

                {!!Form::open(['action' => 'QuartiersController@store', 'method' => 'POST', 'class' => 'cmxform'])!!}
                <div class="col-md-6">
                  <div class="form-group">
                    <select class="select2-A" id="commune_id" name="commune_id">
                        @if(count($communes) > 0)
                          @foreach($communes as $commune)
                            @php($communeId = $commune->id)
                            <option @if($communeId == $selectedCommune) selected='selected' @endif value="{{$commune->id}}">{{$commune->nom}}</option>
                          @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::text('nom', '', ['class' => 'form-text', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
                    <label>Nom du quartier</label>
                  </div>

                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    {{Form::textarea('description', '', ['class' => 'form-textarea', 'placeholder' => 'Description', 'aria-required' => 'true'])}}
                    <span class="bar"></span>
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
