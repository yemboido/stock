@extends('layouts/app')

@section('content')
<form method="POST" action="{{route('boutiques.update',$boutique->id)}}">
  @csrf
  @method('PUT')
   <div class="form-group">
       <label>Nom boutique</labele>
       <input class="form-control" name="libelle" type="text" placeholder="nom boutique" value="{{$boutique->libelle}}">
       @error('libelle') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>
   <div class="form-group">
       <label>Personne référence</labele>
       <input class="form-control" name="personneReference" type="text" placeholder="personne référence" value="{{$boutique->personneReference}}">
       @error('personneReference') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>
   <div class="form-group">
       <label>Téléphone</labele>
       <input class="form-control" name="telephone" type="text" placeholder="téléphone" value="{{$boutique->telephone}}">
       @error('telephone') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>
   <div class="form-group">
       <label>Adresse</labele>
       <input class="form-control" name="adresse" type="text" placeholder="adresse" value="{{$boutique->adresse}}">
       @error('adresse') <div class="error text-danger" >{{ $message }}</div> @enderror
   </div>
   <div class="form-group">
        <label>statue</label>
        <select name="actif" value="{{$boutique->actif}}" class="form-control">
            <option value="1">Actif</option>
            <option value="0">désactif</option>
        </select>
   </div>
   <button type="submit" class="btn btn-success">Modifier</button>
   <a class="btn btn-danger" href="{{route('boutiques.index')}}"> Annuler</a>
</form>
@endsection