
                        <form method="post" >
                         
                            <div class="row">
                                <div class="input-field col-4">
                                        <label for="dateCommande">Date Commande</label>
                                        <input type="date"  id="dateCommande" wire:model="dateCommande"   class="form-control">
                                        @error('dateCommande') <div class="error text-danger" >{{ $message }}</div> @enderror
                                    </div>

                                    <div class="input-field col-4">
                                        <label for="fournisseur_id">Fournisseur</label>
                                        <select wire:model='fournisseur_id' id="fournisseur_id" class="form-control">
                                            <option value=''>------------</option>
                                            @foreach($fournisseurs as $fournisseur)
                                            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                            @endforeach
                                        </select>
                                    
                                        @error('fournisseur_id') <div class="error text-danger" >{{ $message }}</div> @enderror   
                                    </div>
                                    <div class="input-field col-4">
                                        <label for="datePobableLivraison">Date Probable Livraison</label>
                                        <input type="date"  id="datePobableLivraison" wire:model="dateProbableLivraison"   class="form-control">
                                        @error('dateProbableLivraison') <div class="error text-danger" >{{ $message }}</div> @enderror
                                    </div>

                               </div>
                               <hr>
                              
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
                                        <button class="btn btn-danger " wire:click.prevent="remove({{$key}})">X</button>
                                    </div>
                                   
                                </div>
                                    
                                    @endforeach
                               
                                <button class="btn text-white btn-info " wire:click.prevent="add({{$i}})">+</button>
                                    <button wire:click.prevent="update({{$commande_id}})" class="btn btn-success">Enregistrer</button>

                                    <a class="btn btn-danger" href="{{url('commandes')}}">Annuler</a>
                                    
                         
                    </form>
