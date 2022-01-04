<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sortie;
use App\Models\Produit;
use App\Models\User;
use App\Models\InfoSortie;
class Sorties extends Component
{
    public $updateMode=false ,$createMode= false,$viewMode=false;

    public $inputs = [];
    public $i = 0;
    public $sorties,$produits;
    public $vendeur,$infos;
    public $quantite=[],$produit_id=[],$dateSortie;
    public $info_id=[],$mauvaise_quantite,$vendeurs,$prix=[];
    
   
    public $ajouter_detail=false,$sortie_id;

    

    public function add($i)
    {   
    
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);

    }
 
    public function remove($i)
    {
        unset($this->inputs[$i]);
       
    }
    public function render()
    {   
       $this->produits=Produit::all();
       $this->sorties=Sortie::all();
       $this->vendeurs=User::all();

       
       return view('livewire.sortie.index');
    }

    public function create()
    {
        $this->createMode=true;
       // dd($this->updateMode);
       
    }


    private function resetCreateForm(){
       $this->vendeur="";
       $this->dateSortie="";
       $this->quantite=[];
       $this->produit_id=[];
       $this->sortie_id=[];
       $this->inputs=[];
       $this->i=0;
       $this->updateMode=$this->createMode=$this->viewMode=$this->ajouter_detail=false;
      
    }
    
    public function store()
    {
        $sortie=Sortie::Create(
             [
            'dateSortie' => $this->dateSortie,
            'vendeur' => $this->vendeur,
            'user_id' =>1// Auth::user()->id,
        ]);
        
    foreach ($this->quantite as $key=>$value) {
       
        InfoSortie::create([
            'quantite'=>$this->quantite[$key],
            'produit_id'=>$this->produit_id[$key],
            'sortie_id'=>$sortie->id,
           
        ]);

        Produit::find($this->produit_id[$key])->decrement('quantite',$this->quantite[$key]);
    }

       
        session()->flash('message','Entree creer.');

       
        $this->resetCreateForm();
        
       
    }

    public function edit($id)
    {   $this->updateMode=true;
        $sortie=Sortie::find($id);
       
        $this->sortie_id=$id;
        $this->vendeur=$sortie->vendeur;
        $this->dateSortie=$sortie->dateSortie;

        $this->infos=Sortie::join('info_sorties','info_sorties.sortie_id','=','sorties.id')
        ->where('sorties.id','=',$id)
        ->select('*','sorties.id as sortie_id','info_sorties.id as info_sortie_id')
        ->get();

        //dd($id);
         foreach($this->infos as $key=>$info)
        {   
           array_push($this->produit_id,$info->produit_id);
            array_push($this->quantite,$info->quantite);
           array_push($this->inputs,$key);
           array_push($this->info_id,$this->infos[$key]->info_sortie_id);
        }
      
        $this->mauvaise_quantite=$this->quantite;
    }


    
    public function delete($id)
    {
        $commande=Commande::find($id);

        $infoCommande=CommandeProduit::where('commande_id','=',$commande->id)->get();
        foreach($infoCommande as $info)
        {
            $info->delete();
        }

        $commande->delete();
        session()->flash('message', 'Commande supprimer.');
        $this->resetCreateForm();
    }


    


    public function view($id){
      
        $this->viewMode=true;
        $this->infos=Infosortie::join('sorties','info_sorties.sortie_id','=','sorties.id')
        ->where('sorties.id','=',$id)
        ->select('*','sorties.id as sortie_id','info_sorties.id as info_sortie_id')
        ->get();
        //dd($this->infos[0]->produit);
        
    }

    public function annuler (){
        $this->resetCreateForm();
    }

    public function update(){
        //dd($this->mauvaise_quantite);
        
        foreach ($this->inputs as $key => $value) {

            Produit::find($this->produit_id[$key])->decrement('quantite',$this->mauvaise_quantite[$key]);


            Infosortie::find($this->info_id[$key])->update([
                'produit_id'=>$this->produit_id[$key],
                'quantite'=>$this->quantite[$key]
            ]);

            Produit::find($this->produit_id[$key])->increment('quantite',$this->quantite[$key]);

        }
            

        $this->resetCreateForm();
       
    }

    public function ajouter_detail($id){

        $this->resetCreateForm();
        $this->ajouter_detail=true;
        $this->sortie_id=$id;
    }

    public function addDetail(){

        Infosortie::create([
            'quantite'=>$this->quantite,
            'produit_id'=>$this->produit_id,
            'sortie_id'=>$this->sortie_id,
        ]);

        session()->flash('message', 'details ajouter.');
        $this->resetCreateForm();
    }

  public function calculerPrix(){
    for($i=0;$i<count($this->produit_id);$i++)
    {
        $produit=Produit::find($this->produit_id[$i]);
        
        array_push($this->prix,$produit->prixVente);
       
    }
    dd($this->prix);
  }

}
