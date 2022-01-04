<table class="table table-striped">
	<tr>
		
		<th>Fournisseur</th>
		<th>Date Entree</th>
	</tr>
	<tr>
		
		<td>{{$infos[0]->sortie->vendeur_info->nom}}  {{$infos[0]->sortie->vendeur_info->prenom}}</td>
		<td>{{$infos[0]->created_at}}</td>

	</tr>

	
</table>

<table class="table table-striped">
	<tr>
		<th>Categorie</th>
		<th>Produit</th>
		
		<th>Quantie receptionnée</th>
	</tr>
	@foreach($infos as $info)
		<tr>
			<td>{{$info->produit->categorie->libelle}}</td>
			<td>{{$info->produit->libelle}}</td>
			<td>{{$info->quantite}}</td>
			
		<tr>
	@endforeach
</table>
<button wire:click.prevent="annuler()" class="btn btn-success">précedent</button> 