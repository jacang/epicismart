<form class="" action="{{url('/dimes/search')}}">
    <div class="row">
        <div class="col-md-6">
          <div class="col-md-12">
              <div class="col-md-4">
                <div class="form-group form-animate-text">
                  @php($dateStartValue = "")
                  @if(request()->query('matricule'))
                    @php($dateStartValue = 'value='.request()->query('dateStart'))
                  @endif
                  <input type="text" class="form-text dateAnimateStart" {{$dateStartValue}} name="dateStart" id="dateStart" required>
                  <span class="bar"></span>
                  <label><span class="fa fa-calendar"></span> Date début</label>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group form-animate-text">
                  @php($dateEndValue = "")
                  @if(request()->query('matricule'))
                    @php($dateEndValue = 'value='.request()->query('dateEnd'))
                  @endif
                  <input type="text" class="form-text dateAnimateEnd" {{$dateEndValue}} name="dateEnd" id="dateEnd" required>
                  <span class="bar"></span>
                  <label><span class="fa fa-calendar"></span> Date fin</label>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group form-animate-text">
                  @php($matriculeValue = "")
                  @if(request()->query('matricule'))
                    @php($matriculeValue = 'value='.request()->query('matricule'))
                  @endif
                  <input type="text" class="form-text autocomplete_txt matricule" {{$matriculeValue}} id="matricule" name="matricule">
                  <input type="hidden" id="membre_id" name="membre_id">
                  <span class="bar"></span>
                  <label><span class="fa fa-calendar"></span> Matricule</label>
                </div>
              </div>
          </div>



        </div>

        <div class="col-md-6">
          <div class="col-md-12">
              <div class="col-md-4">
                <div class="form-group form-animate-text">
                  @php($montantStartValue = "")
                  @if(request()->query('montantStart'))
                    @php($montantStartValue = 'value='.request()->query('montantStart'))
                  @endif
                  <input type="text" class="form-text montantStart" {{$montantStartValue}} id="montantStart" name="montantStart">
                  <span class="bar"></span>
                  <label><span class="fa fa-calendar"></span> Montant >=</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group form-animate-text">
                  @php($montantEndValue = "")
                  @if(request()->query('montantEnd'))
                    @php($montantEndValue = 'value='.request()->query('montantEnd'))
                  @endif
                  <input type="text" class="form-text montantEnd" {{$montantEndValue}} id="montantEnd" name="montantEnd">
                  <span class="bar"></span>
                  <label><span class="fa fa-calendar"></span> Montant <=</label>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group form-animate-text">
                    <select class="form-text" name="titre" id="titre">
                        <option value="">Selectionnez un titre</option>
                        @if(count($titres) > 0)
                          @foreach($titres as $titre)
                            @php($titreSelected = "")
                            @if(request()->query('titre') == $titre->id)
                              @php($titreSelected = 'selected=selected')
                            @endif
                            <option {{$titreSelected}} value="{{$titre->id}}">{{$titre->nom}}</option>
                          @endforeach
                        @endif
                    </select>
                    <label><span class="fa fa-calendar"></span> Titre</label>
                  </div>
              </div>
          </div>
        </div>

        <div class="col-md-12 text-right">
            <input id="searchDime" class="btn btn-primary" type="submit" name="" value="Rechercher">
        </div>
    </div>
</form>
