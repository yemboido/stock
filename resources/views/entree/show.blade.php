@extends('layouts/admin')

@section('content')


    <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">

					<table>
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Contact</th>
							<th>Structure</th>
							
						</tr>
						<tr>
							<td>{{$fournisseur->nom}}</td>
							<td>{{$fournisseur->prenom}}</td>
							<td>{{$fournisseur->contact}}</td>
							<td>{{$fournisseur->structure}}</td>
							
						</tr>
					</table>
				</div>
			</div>
	</div>

@endsection