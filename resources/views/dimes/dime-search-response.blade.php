<div class="responsive-table">
    <table id="datatables-example" class="table table-striped table-bordered">
        <thead>
          <t>
            <th>
              Matricule
            </th>
            <th>
              Nom
            </th>
            <th>
              Prénoms
            </th>
            <th>
              Titre
            </th>
            <th>
              Montant
            </th>
            <th>
              Date
            </th>
            <th>
              Contact
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($membres as $membre)
            <tr>
              <td>{{$membre->matricule}}</td>
              <td>{{$membre->nom}}</td>
              <td>{{$membre->prenom}}</td>
              <td>{{$membre->titre->nom}}</td>
              <td>{{$membre->montant}}</td>
              <td>{{date('d-m-Y', strtotime($membre->date))}}</td>
              <td>{{$membre->contact}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
