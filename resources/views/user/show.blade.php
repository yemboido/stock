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
                            <th>Email</th>
							<th>role</th>
							
						</tr>
						<tr>
							<td>{{$user->nom}}</td>
							<td>{{$user->prenom}}</td>
							<td>{{$user->telephone}}</td>
							<td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
							
						</tr>
					</table>
				</div>
			</div>
	</div>

@endsection