<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Entrer;
use App\Models\InfoEntrer;

use App\Models\Produit;
use App\Models\Fournisseur;
use Auth;

class Entrers extends Component
{   public $updateMode=false ,$createMode= false,$viewMode=false;

    public $inputs = [];
    public $i = 0;
    public $entrees,$produits,$fournisseurs,$dateEntrer;
    public $fournisseur_id,$entrer_id,$infos;
    public $quantite=[],$produit_id=[];
    public $info_id=[],$mauvaise_quantite;
    public $ajouter_detail=false;

    

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
       $this->entrees=Entrer::all();
       $this->fournisseurs=Fournisseur::all();
       return view('livewire.entree.index');
    }

    public function create()
    {
        $this->createMode=true;
       // dd($this->updateMode);
       
    }


    private function resetCreateForm(){
       $this->fournisseur_id="";
       $this->dateEntrer="";
       $this->quantite=[];
       $this->produit_id=[];
       $this->entrer_id=[];
       $this->inputs=[];
       $this->i=0;
       $this->updateMode=$this->createMode=$this->viewMode=$this->ajouter_detail=false;
      
    }
    
    public function store()
    {
        $entree=Entrer::Create(
             [
            'dateEntrer' => $this->dateEntrer,
            'fournisseur_id' => $this->fournisseur_id,
            'user_id' =>1// Auth::user()->id,
        ]);
        
    foreach ($this->quantite as $key=>$value) {
       
        InfoEntrer::create([
            'quantite'=>$this->quantite[$key],
            'produit_id'=>$this->produit_id[$key],
            'entrer_id'=>$entree->id,
        ]);

        Produit::find($this->produit_id[$key])->increment('quantite',$this->quantite[$key]);
    }

       
        session()->flash('message','Entree creer.');

       
        $this->resetCreateForm();
        
       
    }

    public function edit($id)
    {   $this->updateMode=true;
        $entrer=Entrer::find($id);
       
        $this->entrer_id=$id;
        $this->fournisseur_id=$entrer->fournisseur_id;
        $this->dateEntrer=$entrer->dateEntrer;

        $this->infos=Entrer::join('info_entrers','info_entrers.entrer_id','=','entrers.id')
        ->where('entrers.id','=',$id)
        ->select('*','entrers.id as entrer_id','info_entrers.id as info_entrer_id')
        ->get();

        //dd($id);
         foreach($this->infos as $key=>$info)
        {   
           array_push($this->produit_id,$info->produit_id);
            array_push($this->quantite,$info->quantite);
           array_push($this->inputs,$key);
           array_push($this->info_id,$this->infos[$key]->info_entrer_id);
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
        $this->infos=InfoEntrer::join('entrers','info_entrers.entrer_id','=','entrers.id')
        ->where('entrers.id','=',$id)
        ->select('*','entrers.id as entrer_id','info_entrers.id as info_entrer_id')
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


            InfoEntrer::find($this->info_id[$key])->update([
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
        $this->entrer_id=$id;
    }

    public function addDetail(){

        InfoEntrer::create([
            'quantite'=>$this->quantite,
            'produit_id'=>$this->produit_id,
            'entrer_id'=>$this->entrer_id,
        ]);

        session()->flash('message', 'details ajouter.');
        $this->resetCreateForm();
    }
}
