@extends('layouts/admin')

@section('content')
        <!--here place content -->
        <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">
                    <form method="post" action="{{route('commandes.store')}}" enctype="multipart/form-data">
                         @csrf
                        <div class="card-panel">
                            <blockquote>Nouvelle Commande</blockquote>

                            
                            
                           <div class="input-field">
                                <label for="titre">Date Commande</label>
                                <input type="date" id="titre" name="dateCommande" required="" placeholder="Titre de la categorie">
                                 @error('dateCommande') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>

                            <div class="input-field">
                                <label for="titre">Date probabe livraison</label>
                                <input type="date" id="titre" name="dateProbabeLivraison" required="" placeholder="Titre de la categorie">
                                 @error('dateProbabeLivraison') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>

                           <div class="input-field">
                                <label>Fournisseur</label>
                                <select name="fournisseur_id">
                                    @foreach($fournisseurs as $fournisseur)
                                    <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                        <div class="row">
                            <div class="input-field">
                                <label>Produit</label>
                                <select name="produit_id">
                                    @foreach($produits as $produit)
                                    <option value="{{$produit->id}}">{{$produit->libelle}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-field">
                                <label for="titre">Quantite</label>
                                <input type="number" id="titre" name="quantite" required="" placeholder="quantite">
                                 @error('quantite') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>

                            <a class="btn btn-primary">+</a>
                        </div>
                         
                        <div>
                            <button class="waves-effect waves-dark orange btn-large center" type="submit">Ajouter</button>

                        </div>
                </form>
                </div>
                
            </div>     

                           
        </div>

  @endsection