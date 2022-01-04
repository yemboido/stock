<form method="post" >
    
    <div class="row">    
        <div class="col-5">
            <label>Fournisseur</label>
              <select  wire:model="fournisseur_id" class="form-control" value="{{$fournisseur_id}}">
                  <option value="--------">--------------</option>
                  @foreach($fournisseurs as $fournisseur)
                  <option value="{{$fournisseur->id}}" >{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                @endforeach 
                </select>                    
        </div>

        
        <div class="col-5">
            <label>Date d'entrée</label>
            <input type='date' wire:model="dateEntrer"  class="form-control" value="{{$dateEntrer}}">
        </div>
    </div>
    <hr></hr>
    <button wire:click.prevent="ajouter_detail({{$entrer_id}})" class="btn btn-primary right">ajouter details</button> 
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
                 
                                  
      </div>
                                  
         @endforeach
    <div class="text-center mt-2">
      <button wire:click.prevent="update()" class="btn btn-success">modifier</button>
      <button wire:click.prevent="annuler()" class="btn btn-success">annuler</button> 
    </div>  
                                 
                         
    </form>
