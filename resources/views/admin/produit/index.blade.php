@extends('layouts/admin')

@section('content')
        <!--here place content -->
        <div class="main">
             @if(session()->has('message'))
             <div class="row" id="alert_box">
                <div class="col s12">
                    <div class="card green darken-1">
                      <div class="row">
                        <div class="col s10">
                          <div class="card-content white-text">
                           
                         {{session('message')}}
          
                          </div>
                        </div>
                        <div class="col s2">
                          <i class="material-icons icon_style" id="alert_close">close</i>
                        </div>
                      </div>
                      
                    </div>
                </div>
            </div> 
              @endif

            <div class="row">

                <div class="col s12 m12 l12">
                  
                    <div class="card-panel">
                        
                        <a class= "waves-effect waves-dark orange btn-large right" href="{{route('produits.create')}}"><i class="material-icons white-text right">add</i>CREER</a>
                        <table class="striped">
                            <thead>
                              <tr>
                             
                                  <th>Nom</th>
                                  <th>Prix d'achat</th>
                                  <th>Prix de vente</th>
                                  <th>Prix revendeur</th>
                                  <th>description</th>
                                  <th>Image</th>
                                  <th>Actions</th>
                              </tr>
                            </thead>

                            <tbody>
                              @foreach($produits as $produit)
                                <tr>
                                    <td>{{$produit->libelle}}</td>
                                    <td>{{$produit->prixAchat}}</td>
                                    <td> {{$produit->prixVente}}</td>
                                    <td> {{$produit->prixRevendeur}}</td>
                                    <td> {{$produit->description}}</td>
                                     <td> 
                                       <img src="{{asset('storage/upload/image/'.$produit->image)}}"  alt="authorname" class="circle materialboxed" height="80" width="80">
                                      </td>
                                   <form action="{{route('produits.destroy',$produit->id)}}" method="post">
                                    <td>
                                        <a href="{{route('produits.show',$produit->id)}}" class="btn-small waves-effect waves-light back tooltipped z-depth-0" data-position="top" data-tooltip="View details"><i class="material-icons white-text">remove_red_eye</i></a>&nbsp

                                        <a class="waves-effect waves-dark green btn-small z-depth-0"  href="{{route('produits.edit',$produit->id)}}"><i class="material-icons">edit</i></a>&nbsp
                                        @csrf
                                      @method('DELETE')
                                       <button type="submit" class="waves-effect waves-dark red btn-small z-depth-0 btn-submit"><i class="material-icons">delete</i></button>
                                    </td>
                                  </form>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>

                        <br>
                        <!-- pagination section -->
                        <div class="center">
                          
                            <ul class="pagination">

                              <li class="disabled"><a href=""><i class="material-icons">chevron_left</i></a></li>
                              {!! $produits->links() !!} 
                              <li class="waves-effect"><a href="#"><i class="material-icons">chevron_right</i></a></li>

                            </ul>

                        </div>
                        
                    </div>
                </div>
                
            </div>     

                           
        </div>

 @endsection