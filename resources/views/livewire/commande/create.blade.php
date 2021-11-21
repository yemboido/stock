
                        <form method="post" >
                         

                                <div class="input-field">
                                        <label for="dateCommande">Date Commande</label>
                                        <input type="date"  id="dateCommande" wire:model="dateCommande"  placeholder="date Commande ">
                                        @error('dateCommande') <div class="error text-danger" >{{ $message }}</div> @enderror
                                    </div>

                                    <div class="input-field">
                                        <label for="fournisseur_id">Fournisseur</label>
                                        <select wire:model='fournisseur_id' id="fournisseur_id">
                                            <option value=''>------------</option>
                                            @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                            @endforeach
                                        </select>
                                    
                                        @error('fournisseur_id') <div class="error text-danger" >{{ $message }}</div> @enderror   
                                    </div>
                                    <div class="input-field">
                                        <label for="datePobableLivraison">Date Probable Livraison</label>
                                        <input type="date"  id="datePobableLivraison" wire:model="dateProbableLivraison"  placeholder="date Probable Livraison ">
                                        @error('dateProbableLivraison') <div class="error text-danger" >{{ $message }}</div> @enderror
                                    </div>

                               
                                  <div class="col-6">
                                  <label for="fournisseur_id">Produit</label>
                                        <select wire:model='produit_id.0' id="fournisseur_id">
                                            <option value=''>------------</option>
                                            @foreach($produits as $produit)
                                            <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                                            @endforeach
                                        </select>
                                    
                                        @error('produit_id.0') <div class="error text-danger" >{{ $message }}</div> @enderror   
                                  </div>

                                  <div class="col-6">
                                  <label for="quantite">quantite</label>
                                       <input type="tex"  wire:model="quantite.0" placeholder='quantite'>
                                    
                                        @error('quantite.0') <div class="error text-danger" >{{ $message }}</div> @enderror   
                                  </div>

                               
                                  @foreach($inputs as $key => $value)
                                

                                <div class="col-6">
                                    <label>Produit</label>
                                        <select wire:model='produit_id.{{ $value }}' >
                                            <option value=''>------------</option>
                                            @foreach($produits as $produit)
                                            <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                                            @endforeach
                                        </select>
                                    
                                        @error('produit_id.*') <div class="error text-danger" >{{ $message }}</div> @enderror   
                                </div>

                                <div class="col-6">
                                <label for="quantite">Quantite</label>
                                    <input type="tex"  wire:model="quantite.{{ $value }}" placeholder="quantite">
                                
                                    @error('quantite.*') <div class="error text-danger" >{{ $message }}</div> @enderror   
                                </div> 
                                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
                                   
                                    
                                    @endforeach
                               
                                <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                                    <button wire:click.prevent="store()" class="btn btn-success">Enregistrer</button>
                                    
                         
                    </form>
