@extends('layouts/admin')

@section('content')
        <!--here place content -->
        @if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> Erreurs dans votre saisies.<br><br>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
        <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">
                    <form method="post" action="{{route('produits.store')}}" enctype="multipart/form-data">
                         @csrf
                        <div class="card-panel">
                            <blockquote>Nouveau produit</blockquote>

                            <div class="input-field">
                                <label for="libelle">libelle</label>
                                <input type="text" id="libelle" name="libelle"  placeholder="nom du produit">
                                 @error('libelle') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="input-field">
                                <select name="categorie_id">
                                   
                                    @foreach($categories as $cat)
                                    <option value='{{$cat->id}}'>{{$cat->libelle}}</option>
                                  @endforeach
                                </select>
                                <label>Catégorie</label>      
                            </div>

                            <div class="input-field">
                                <label for="slug">Prix d'achat</label>
                                <input type="text"  name="prixAchat" required="" placeholder="prix d'achat ">
                            </div>
                            <div class="input-field">
                                <label for="slug">Prix de vente</label>
                                <input type="text"  name="prixVente" required="" placeholder="prix de vente ">
                            </div>
                            <div class="input-field">
                                <label for="slug">Prix de revente</label>
                                <input type="text"  name="prixRevendeur" required="" placeholder="prix de revendeur ">
                            </div> 

                            <div class="file-field input-field">
                                <div class="btn">
                                   <span>Image</span>
                                   <input type="file" name="image" id="icone" required="">
                                </div>

                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="image" id="icone" type="text" required="" placeholder="Parcourir">
                                </div>
                            </div>

                            <div class="input-field">
                                <label for="description">Details</label>
                                 <textarea id="description" name="description" class="materialize-textarea h_300" required=""></textarea>   
                            </div>

                            <button class="waves-effect waves-dark orange btn-large center" type="submit">Publier</button>

                        </div>
                </form>
                </div>
                
            </div>     

                           
        </div>

  @endsection