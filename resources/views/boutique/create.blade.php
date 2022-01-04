@extends('layouts/app')

@section('content')

<form method="post" action="{{route('boutiques.store')}}">
   @csrf
   
   <div class="form-group">
       <label>Nom boutique</labele>
       <input class="form-control" name="libelle" type="text" placeholder="nom boutique">
       @error('libelle') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>
   <div class="form-group">
       <label>Personne référence</labele>
       <input class="form-control" name="personneReference" type="text" placeholder="personne référence">
       @error('personneReference') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>
   <div class="form-group">
       <label>Téléphone</labele>
       <input class="form-control" name="telephone" type="text" placeholder="téléphone">
       @error('telephone') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>
   <div class="form-group">
       <label>Adresse</labele>
       <input class="form-control" name="adresse" type="text" placeholder="adresse">
       @error('adresse') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>

  
   <button type="submit" class="btn btn-success">Ajouter</button>
   <a class="btn btn-danger" href="{{route('boutiques.index')}}"> Annuler</a>
</form>
@endsection