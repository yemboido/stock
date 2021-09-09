@extends('layouts/admin')

@section('content')
	
	<div class="main">
		<div class="row">
			 <div class="card-panel">
			 	<table class="striped ">
			 		<tr>
			 			
			 				<img src="{{asset('storage/upload/image/'.$produit->image)}}" class="materialboxed"  >
			 		</tr>
			 		<tr>
			 			<th>Nom</th>
						<th>Prix d'achat</th>
						<th>prixde vente</th>
						<th>prix des revendeur</th>
						<th>description</th>
			 			
			 		</tr>

			 		<tr>
					 	<td>{{$produit->libelle}}</td>
			 			<td>{{$produit->prixAchat}}</td>
			 			<td>{{$produit->prixVente}}</td>			 			
			 			<td>{{$produit->prixRevendeur}}</td>
						<td>{{$produit->description}}</td>
			 		</tr>
			 		
			 		
			 	</table>
			
		
		
		
			</div>
		</div>		
	</div>
		

	
@endsection
