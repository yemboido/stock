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
                                <input type="text" id="nom" name="name"  placeholder="nom ">
                                 @error('name') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="input-field">
                                  <label for="nom">Email</label>
                                <input type="text" id="nom" name="email"  placeholder="email">
                                 @error('email') <div class="error text-danger" >{{ $message }}</div> @enderror   
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
                                    <option value="admin">Administrateur</option>
                                    <option value="author">Auteur</option>
                                    <option value="subscriber">Utilisateur simple</option>
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