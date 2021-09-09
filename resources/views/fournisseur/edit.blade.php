@extends('layouts/admin')

@section('content')


     <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">
                    <form method="post" action="{{route('fournisseurs.update',$fournisseur->id)}}">
                         @csrf
                         @method('PUT')
                         <div class="card-panel">
                            <blockquote>Nouveau Fournisseur</blockquote>

                            <div class="input-field">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom"  placeholder="nom " value="{{$fournisseur->structure}}">
                                 @error('nom') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="input-field">
                                  <label for="nom">Prenom</label>
                                <input type="text" id="nom" name="prenom"  placeholder="prenom" value="{{$fournisseur->structure}}">
                                 @error('prenom') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                            <div class="input-field">
                                  <label for="nom">Contact</label>
                                <input type="text" id="nom" name="contact"  placeholder="contact" value="{{$fournisseur->structure}}">
                                 @error('contact') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                            <div class="input-field">
                                  <label for="nom">Structure</label>
                                <input type="text" id="nom" name="structure"  placeholder="structure" value="{{$fournisseur->structure}}">
                                 @error('structure') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                           
                            

                            
                            <button class="waves-effect waves-dark orange btn-large center" type="submit">Modifier</button>

                        </div>
                </form>
                </div>
                
            </div>     

                           
        </div>

@endsection