<div>
    @if($createMode)
        @include('livewire.entree.create')
    @elseif($updateMode)
        @include('livewire.entree.edit')
    @elseif($viewMode)
        @include('livewire.entree.show')
    @elseif($ajouter_detail)
        @include('livewire.entree.create-detail')
    @else
      
   <button wire:click="create()" class="btn btn-success">creer</button>
    <table class="table table-bordered mt-5">
        <h2 class="text-primary text-center">Gestion des entrées</h2>
        <thead>
            <tr>
                <th>Date entree</th>
                <th>Fournisseur</th>
               
               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entrees as $value)
            <tr>
                <td>{{ $value->dateEntrer }}</td>
                <td>{{ $value->fournisseur->nom}} {{ $value->fournisseur->prenom}}</td>
              
                
               
                <td>
                <button wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="view({{ $value->id }})" class="btn btn-primary btn-sm">View</button>
               <!--  <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif
</div>