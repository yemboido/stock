@extends('layouts/admin')

@section('content')
        <!--here place content -->
        <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">
                    <form method="post" action="{{route('users.store')}}">
                         @csrf
                        <div class="card-panel">
                            <blockquote>Nouveau Membre</blockquote>

                            <div class="input-field">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom"  placeholder="nom ">
                                 @error('nom') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>

                            <div class="input-field">
                                <label for="nom">Prenom</label>
                                <input type="text" name="prenom"  placeholder="nom ">
                                 @error('prenom') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="input-field">
                                  <label for="nom">Email</label>
                                <input type="text"  name="email"  placeholder="email">
                                 @error('email') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                            <div class="input-field">
                                  <label for="nom">Telephone</label>
                                <input type="text"  name="telephone"  placeholder="telephone">
                                 @error('telephone') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                            <div class="input-field">
                                  <label for="nom">Mots de passe</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                 @error('password') <div class="error text-danger" >{{ $message }}</div> @enderror 
                            </div>
                            <div  class="input-field">
                            <label >{{ __('Confirmation Mots de passe') }}</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('passwor-confirmation') <div class="error text-danger" >{{ $message }}</div> @enderror 
                            </div>
                            

                            <div  class="input-field">
                            <label >Role</label>

                                <select class="form-control" name="role">
                                
                                    <option value="admin">Vendeur </option>
                                    <option value="superadmin">Revendeur</option>
                                    <option value="comptable">Administrateur</option>
                                    <option value="revendeur">Revendeur</option>
                                    <option value="caissier">Caissier</option>
                                </select>
                               
                                @error('role') <div class="error text-danger" >{{ $message }}</div> @enderror 
                            </div>
                            <button class="waves-effect waves-dark orange btn-large center" type="submit">Ajouter</button>

                        </div>
                </form>
                </div>
                
            </div>     

                           
        </div>

  @endsection