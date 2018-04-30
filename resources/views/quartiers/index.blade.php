@extends('layouts.base')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-10">
          <h3 class="animated fadeInLeft">Quartiers</h3>
          <p class="animated fadeInDown">
            Quartiers <span class="fa-angle-right fa"></span> Créer
          </p>
      </div>
      <div class="col-md-2">
        <div class="add-new-btn-wrapper">
          <a href="/quartiers/create" class="btn btn-primary">Nouveau</a>
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
      <div class="panel-heading"><h3>Liste</h3></div>
      <div class="panel-body">
        <div class="responsive-table">
        <div id="datatables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          <div class="row">
            <div class="col-sm-6">
              <div class="dataTables_length" id="datatables-example_length">
                <label>
                  Show
                  <select name="datatables-example_length" aria-controls="datatables-example" class="form-control input-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                  entries
                </label>
              </div>
            </div>
            <div class="col-sm-6">
              <div id="datatables-example_filter" class="dataTables_filter">
                <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatables-example">
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table id="datatables-example" class="table table-striped table-bordered dataTable no-footer" width="100%" cellspacing="0" role="grid" aria-describedby="datatables-example_info" style="width: 100%;">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="datatables-example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 140px;" aria-sort="ascending">
                      Nom
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables-example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">
                      Prénoms
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables-example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 50px;">
                      Sexe
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables-example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">
                      Commune
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables-example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">
                      Quartier
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables-example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 120px;">
                      Contact
                    </th>
                  </tr>
                </thead>
        <tbody>
        <tr role="row" class="odd">
          <td class="sorting_1">Angaman</td>
          <td>Kouadio Jacob</td>
          <td>Ancien</td>
          <td>Koumassi</td>
          <td>Sowéto</td>
          <td>40176420 / 57966918</td>
        </tr>
        <tr role="row" class="even">
          <td class="sorting_1">Kossonou</td>
          <td>Kobenan Fidèle</td>
          <td>Ancien</td>
          <td>Cocody</td>
          <td>Rivera</td>
          <td>57966918 / 40176420 </td>
        </tr>
        <tr role="row" class="odd">
          <td class="sorting_1">Angaman</td>
          <td>Kouadio Jacob</td>
          <td>Ancien</td>
          <td>Koumassi</td>
          <td>Sowéto</td>
          <td>40176420 / 57966918</td>
        </tr>
        <tr role="row" class="even">
          <td class="sorting_1">Kossonou</td>
          <td>Kobenan Fidèle</td>
          <td>Ancien</td>
          <td>Cocody</td>
          <td>Rivera</td>
          <td>57966918 / 40176420 </td>
        </tr>
        <tr role="row" class="odd">
          <td class="sorting_1">Angaman</td>
          <td>Kouadio Jacob</td>
          <td>Ancien</td>
          <td>Koumassi</td>
          <td>Sowéto</td>
          <td>40176420 / 57966918</td>
        </tr>
        <tr role="row" class="even">
          <td class="sorting_1">Kossonou</td>
          <td>Kobenan Fidèle</td>
          <td>Ancien</td>
          <td>Cocody</td>
          <td>Rivera</td>
          <td>57966918 / 40176420 </td>
        </tr>
        <tr role="row" class="odd">
          <td class="sorting_1">Angaman</td>
          <td>Kouadio Jacob</td>
          <td>Ancien</td>
          <td>Koumassi</td>
          <td>Sowéto</td>
          <td>40176420 / 57966918</td>
        </tr>
        <tr role="row" class="even">
          <td class="sorting_1">Kossonou</td>
          <td>Kobenan Fidèle</td>
          <td>Ancien</td>
          <td>Cocody</td>
          <td>Rivera</td>
          <td>57966918 / 40176420 </td>
        </tr>
        <tr role="row" class="odd">
          <td class="sorting_1">Angaman</td>
          <td>Kouadio Jacob</td>
          <td>Ancien</td>
          <td>Koumassi</td>
          <td>Sowéto</td>
          <td>40176420 / 57966918</td>
        </tr>
        <tr role="row" class="even">
          <td class="sorting_1">Kossonou</td>
          <td>Kobenan Fidèle</td>
          <td>Ancien</td>
          <td>Cocody</td>
          <td>Rivera</td>
          <td>57966918 / 40176420 </td>
        </tr>
        </tbody>
      </table>
    </div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatables-example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatables-example_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatables-example_previous"><a href="#" aria-controls="datatables-example" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatables-example" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatables-example" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatables-example" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatables-example" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatables-example" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatables-example" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatables-example_next"><a href="#" aria-controls="datatables-example" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
        </div>
    </div>
  </div>
</div>
</div>
@endsection
