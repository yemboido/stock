@extends('layouts/admin')

@section('content')
        <!--here place content -->
        <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">
                    <form method="post" action="{{route('produits.update',$produit->id)}}" enctype="multipart/form-data">
                         @csrf
                                 @method('PUT')

     
                                 <div class="card-panel">
                            <blockquote>Nouveau produit</blockquote>

                            <div class="input-field">
                                <label for="libelle">libelle</label>
                                <input type="text" id="libelle" name="libelle"  placeholder="nom du produit" value="{{$produit->libelle}}">
                                 @error('libelle') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="input-field">
                                <select name="categorie_id" value="{{$produit->categorie_id}}">
                                   
                                    @foreach($categories as $cat)
                                    <option value='{{$cat->id}}'>{{$cat->libelle}}</option>
                                  @endforeach
                                </select>
                                <label>Catégorie</label>      
                            </div>

                            <div class="input-field">
                                <label for="slug">Prix d'achat</label>
                                <input type="text" id="slug" name="prixAchat" required="" placeholder="prix d'achat " value="{{$produit->prixAchat}}">
                            </div>
                            <div class="input-field">
                                <label for="slug">Prix de vente</label>
                                <input type="text" id="slug" name="prixVente" required="" placeholder="prix de vente " value="{{$produit->prixVente}}">
                            </div>
                            <div class="input-field">
                                <label for="slug">Prix de revente</label>
                                <input type="text" id="slug" name="prixRevendeur" required="" placeholder="prix de revendeur " value="{{$produit->prixRevendeur}}">
                            </div> 

                            <div class="file-field input-field">
                                <div class="btn">
                                   <span>Image</span>
                                   <input type="file" name="image" id="icone" required="" value="{{$produit->image}}">
                                </div>

                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="image" id="icone" type="text" required="" placeholder="Parcourir">
                                </div>
                            </div>

                            <div class="input-field">
                                <label for="description">Details</label>
                                 <textarea id="description" name="description" class="materialize-textarea h_300" required="">{{$produit->description}}</textarea>   
                            </div>

                            <button class="waves-effect waves-dark orange btn-large center" type="submit">Modifier</button>

                        </div>
                </form>
                </div>
                
            </div>     

                           
        </div>

  @endsection