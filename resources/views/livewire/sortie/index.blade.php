<div>
    @if($createMode)
        @include('livewire.sortie.create')
    @elseif($updateMode)
        @include('livewire.sortie.edit')
    @elseif($viewMode)
        @include('livewire.sortie.show')
    @elseif($ajouter_detail)
        @include('livewire.sortie.create-detail')
    @else
      
   <button wire:click="create()" class="btn btn-success">creer</button>
    <table class="table table-bordered mt-5">
        <h2 class="text-primary text-center">Gestion des sorties</h2>
        <thead>
            <tr>
                <th>Date sortie</th>
                <th>vendeur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sorties as $value)
            <tr>
                <td>{{ $value->dateSortie }}</td>
                <td>{{ $value->vendeur_info->nom}} {{ $value->vendeur_info->prenom}}</td>
                
               
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