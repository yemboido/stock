    <form method="post" >
    
    <div class="row">    
        <div class="col-5">
            <label>Fournisseur</label>
              <select  wire:model="fournisseur_id" class="form-control">
                  <option value="--------">--------------</option>
                  @foreach($fournisseurs as $fournisseur)
                  <option value="{{$fournisseur->id}}" >{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                @endforeach 
                </select>                    
        </div>

        
        <div class="col-5">
            <label>Date d'entrée</label>
            <input type='date' wire:model="dateEntrer"  class="form-control">
        </div>
    </div>
    <hr></hr>
    <div class="row">
    
     <div class="col-5">
            <label>Produit</label>
              <select  wire:model="produit_id.0" class="form-control">
                  <option value="--------">--------------</option>
                  @foreach($produits as $produit)
                  <option value="{{$produit->id}}" >{{$produit->libelle}} </option>
                @endforeach 
                </select>                    
        </div>
       
        <div class="col-5">
            <label>Quantite </label>
            <input type="text" wire:model="quantite.0" class="form-control">
        </div>
    </div>
    @foreach($inputs as $key => $value)
                                
      <div class="row">
         <div class="col-5">
           <label>Produit</label>
              <select wire:model='produit_id.{{ $value }}' class="form-control">
               <option value=''>------------</option>
                @foreach($produits as $produit)
                  <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                @endforeach
               </select>
                                        
               @error('produit_id.*') <div class="error text-danger" >{{ $message }}</div> @enderror   
            </div>

              <div class="col-5">
                <label for="quantite">Quantite</label>
                    <input type="number"  wire:model="quantite.{{ $value }}" placeholder="quantite" class="form-control">
                                    
                     @error('quantite.*') <div class="error text-danger" >{{ $message }}</div> @enderror   
                 </div> 
                  <div class="2">
                   <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">X</button>
                   </div>
                                   
              </div>
                                    
         @endforeach
         <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">+</button>
     <button wire:click.prevent="store()" class="btn btn-success">Enregistrer</button>
     <button wire:click.prevent="annuler()" class="btn btn-success">annuler</button>                                
                         
    </form>
