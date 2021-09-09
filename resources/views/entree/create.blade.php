@extends('layouts/admin')

@section('content')
        <!--here place content -->
        <div class="main">
            
            <div class="row">

                <div class="col s12 m12 l12">
                    <form method="post" action="{{route('entrees.store')}}">
                         @csrf
                        <div class="card-panel">
                            <blockquote>Nouveau entree</blockquote>

                            <div class="input-field">
                                <label for="nom">Date Entree</label>
                                <input type="date" id="nom" name="dateEntree"  placeholder="nom ">
                                 @error('dateEntree') <div class="error text-danger" >{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="input-field">
                                  <label for="nom">Commande</label>
                                <input type="text" id="nom" name="prenom"  placeholder="prenom">
                                 @error('prenom') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                            <div class="input-field">
                                  <label for="nom">Contact</label>
                                <input type="text" id="nom" name="contact"  placeholder="contact">
                                 @error('contact') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                            <div class="input-field">
                                  <label for="nom">Structure</label>
                                <input type="text" id="nom" name="structure"  placeholder="structure">
                                 @error('structure') <div class="error text-danger" >{{ $message }}</div> @enderror   
                            </div>

                           
                            

                            
                            <button class="waves-effect waves-dark orange btn-large center" type="submit">Ajouter</button>

                        </div>
                </form>
                </div>
                
            </div>     

                           
        </div>

  @endsection