<div>
    @if($createMode)
        @include('livewire.commande.create')
    @elseif($updateMode)
        @include('livewire.commande.edit')
    @else
      
   <button wire:click="create()">creer</button>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Fournisseur</th>
                <th>Date commande</th>
                <th>Date probable livraison</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->fournisseur->nom }} {{ $value->fournisseur->prenom}}</td>
                <td>{{ $value->dateCommande }}</td>
                <td>{{$value->dateProbableLivraison}}</td>
                <td>
                <button wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Modifier</button>
              <!--   <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif
</div>