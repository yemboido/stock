@extends('layouts.default')
@section('content')
        <main>

           
               <div class="slider">
    <ul class="slides" >

      @if(App\Models\Publicite::where('dateFin','>=',date('Y-m-d'))->get() !=NULL)
        @foreach(App\Models\Publicite::where('dateFin','>=',date('Y-m-d'))->get()  as $publicite)
        <li>
          <img src="{{asset('storage/upload/publicite/'.$publicite->image)}}"> <!-- random image -->
          <div class="caption center-align">
            <!-- <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
          </div>
        </li>
       
       @endforeach
       @else
       <li>
          <img src="{{asset('assets\images\sliders\slider-1.jpg')}}"> <!-- random image -->
          <div class="caption center-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>

     @endif
    </ul>
  </div>
<script type="text/javascript">
   $(document).ready(function(){
      $('.slider').slider({full_width: true,duration:1});
    });
</script>


           

            <div class="marge top_3">
                
                <div class="row">
                
                    <!--list of articles -->
                    <div class="col s12 m12 l8">
                    
                      
                        <div class="row">
                            
                            <!--article 1 -->
                            @foreach($articles as $article)
                            <div class="col s12 m6 l6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">


                                 <div class="card-panel border-radius-6 mt-10 card-animation-1">
                                    <!--image-->
                                    <a href="">
                                      <img class="border-radius-8 z-depth-4 image-n-margin" 
                                      src="{{asset('storage/upload/image/'.$article->image)}}" alt="Lorem ipsum<" width="100%" height="200px;">
                                    </a>
                                    <!--title-->
                                    <h6 class="mt-5 truncate">
                                      <a href="{{route('lirePlus',$article->id)}}" >{{$article->titre}}</a>
                                    </h6>
                                    <!--small description-->
                                    <span style="text-align:justify;">
                                      {{substr($article->details,0,100)}}...<a href="{{route('lirePlus',$article->id)}}">LirePlus</a>
                                    </span>
                                    <!--category-->
                                    <h6 class="mt-5">
                                      <a href="{{route('sorted',$article->categorie_id)}}" class="tooltipped" data-position="right" data-tooltip="filtrer par categorie">{{$article->categorie->libelle}}</a>
                                    </h6>
                                    <div class="row mt-4">
                                      <!--author-->
                                      <div class="col s7 mt-1">
                                        <img src="{{asset('assets/images/persons/author-1.png')}}" alt="authorname" class="circle mr-3 width-30 vertical-text-middle" height="55" width="55">
                                        <span class="pt-2">{{$article->user->name}}<!-- <a href="#"  class="tooltipped" data-position="right" data-tooltip="Consult the articles of this blogger"></a> --></span>
                                      </div>
                                      <!--date -->
                                      <div class="col s5 mt-3 right-align social-icon"> <span class="ml-3 vertical-align-top">{{$article->created_at}}</span>
                                      </div>
                                    </div>
                                  </div>
                              
                            </div>
                            @endforeach
                          
                    

                        </div>

                        <br>

                        <!-- pagination section -->
                        <div class="center">
                          
                            <ul class="pagination">

                              <li class="disabled"><a href=""><i class="material-icons">chevron_left</i></a></li>
                              <li class="active"><a href="">1</a></li>
                              {!! $articles->links() !!} 
                              <li class="waves-effect"><a href="#"><i class="material-icons">chevron_right</i></a></li>

                            </ul>

                        </div>

                    </div>

                    <div class="col s10 l4">

                        <!--search bar section-->
                      

                        <!--list of categories-->
                        <ul class="collection with-header z-depth-1">
                  
                            <li class="collection-header center"><h5>CATEGORIES</h5></li>
                           
                            @foreach($categories as $categorie)
                            <a class="collection-item grey-text text-darken-3 truncate" href="{{route('sorted',$categorie->id)}}" > 
                                {{$categorie->libelle}}<br>
                            </a>
                            @endforeach
                           
                        </ul>

                        <br>

                        <!--list of recent articles-->
                        <ul class="collection with-header z-depth-1">
                  
                            <li class="collection-header center"><h5>ACTUALITIES</h5></li>
                            @foreach($infos as $article)
                            <a class="collection-item grey-text text-darken-3 truncate" href="{{route('lirePlus',$article->id)}}" > 
                                {{$article->titre}}<i class="material-icons blue-text right">class</i><br>
                            </a>
                            @endforeach
                        </ul>

                        <br>

                        <!--contacts us -->
                       <!--  <div class="marge_3">

                            <form class="row marge card-panel" onsubmit = "return validateContactMe();" action="" method="POST"  >
                                <h5 class="card-title center">Nous contactez</h5>
                                <div class="input-field col s12">
                                    <input id="email" name="email" type="email" class="" required="">
                                    <label >Email</label>
                                </div>
                                 <div class="input-field col s12">                        
                                    <input id="pseudo" name="pseudo" type="text" class="" required="">
                                    <label for="email">Nom & prenom</label>
                                </div>
                                <div class="input-field col s12">                       
                                    <textarea id="message" name="message" class="materialize-textarea" required="" rows="4" style="height: 110px;"></textarea>
                                    <label for="message">Votre message</label> 
                                </div>
                                <div class="input-field col s12">
                                    <button class="btn-large waves-effect waves-light blue" data-aos="zoom-in" data-aos-delay="300" type="submit" style="width: 100%">Envoyer</button>
                                </div>
                            </form>
                            
                        </div>

                        <br> -->

                        <!--follow us -->
                       
                      
                    </div>


                </div> 


        </main>



@endsection