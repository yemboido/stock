
<div class="row">
    <div class="col-5">
            <label>Produit</label>
              <select  wire:model="produit_id" class="form-control">
                  <option value="--------">--------------</option>
                  @foreach($produits as $produit)
                  <option value="{{$produit->id}}" >{{$produit->libelle}} </option>
                @endforeach 
                </select>                    
        </div>
       
        <div class="col-5">
            <label>Quantite réelle</label>
            <input type="text" wire:model="quantite" class="form-control">
        </div>
</div>

<button wire:click.prevent="addDetail()" class="btn btn-success">Enregistrer</button>
     <button wire:click.prevent="annuler()" class="btn btn-success">annuler</button>   