@extends('layouts/app')

@section('content')

<a href="{{route('boutiques.create')}}" class="btn btn-primary">Ajouter</a>
       <table class="table">
          <tr>
            <th>id</th>
            <th>Boutique</th>
            <th>Personne référence</th>
            <th>Téléphone</th>
            <th>Statue</th>
            <th>Montant caisse</th>
            <th>Action</th>
          </tr>
          @foreach($boutiques as $boutique)
          <tr>
            <td>{{$boutique->id}}</td>
            <td>{{$boutique->libelle}}</td>
            <td>{{$boutique->personneReference}}</td>
            <td>{{$boutique->telephone}}</td>
            <td>{{$boutique->actif}}</td>
            <td>{{$boutique->montantCaisse}}</td>
            <td>
              <a class="btn btn-primary" href="{{route('boutiques.edit',$boutique->id)}}" >Modifier</a>
            </td>
          </tr>
          @endforeach
       </table>

@endsection