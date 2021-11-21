@extends('layouts/admin')

@section('content')


     <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">
                    <form method="post" action="{{route('users.update',$user->id)}}">
                         @csrf
                         @method('PUT')
                        <div class="card-panel">
                            <blockquote>Nouveau Membre</blockquote>



                            <div class="input-field">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom"  placeholder="nom " value="{{$user->nom}}" >
                                 @error('prenom') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                        

                            <div class="input-field">
                                <label for="nom">Prenom</label>
                                <input type="text" name="prenom"  placeholder="nom " value="{{$user->prenom}}" >
                                 @error('prenom') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="input-field">
                                  <label for="nom">Email</label>
                                <input type="text"  name="email"  placeholder="email" value="{{$user->email}}">
                                 @error('email') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                            <div class="input-field">
                                  <label for="nom">Telephone</label>
                                <input type="text"  name="telephone"  placeholder="telephone" value="{{$user->telephone}}">
                                 @error('telephone') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                           
                            

                            <div  class="input-field">
                            <label >Role</label>

                                <select class="form-control" name="role" value="{{$user->role}}">
                                
                                    <option value="admin">Vendeur </option>
                                    <option value="superadmin">Revendeur</option>
                                    <option value="comptable">Administrateur</option>
                                    <option value="revendeur">Revendeur</option>
                                    <option value="caissier">Caissier</option>
                                </select>
                               
                                @error('role') <div class="error text-danger" >{{ $message }}</div> @enderror 
                            </div>
                            <button class="waves-effect waves-dark orange btn-large center" type="submit">Modifier</button>

                        </div>
                </form>
                </div>
                
            </div>     

                           
        </div>

@endsection