@extends('layouts/app')
@section('content')
<table>
	<tr>
		<th>Id</th>
		<th>Nom boutique</th>
		<th>Contact</th>
		<th>Personne référence</th>
		<th>Statue</th>
		<th>Montant caisse</th>
							
	</tr>
	<tr>
		<td>{{$boutique->id}}</td>
		<td>{{$boutique->libelle}}</td>
		<td>{{$boutique->telephone}}</td>
		<td>{{$boutique->personneReference}}</td>
		<td>{{$boutique->actif}}</td>
		<td>{{$boutique->montantCaisse}}</td>
		
							
	</tr>
</table>			
@endsection