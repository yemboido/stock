<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Commande;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\CommandeProduit;
class Commandes extends Component
{
    public $dateCommande,$dateProbableLivraison,$fournisseur_id,$commandes,$fournisseurs,$commande_id;
    public $updateMode=false ,$createMode= false,$produit_id=[],$quantite=[],$produits;
    public $inputs = [];
    public $i = 0;

    public function add($i)
    {   
    
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
        
       

       // dd($this->inputs);
    }
 
    public function remove($i)
    {
        unset($this->inputs[$i]);
       
    }

    public function render()
    {   $this->produits=Produit::all();
        $this->commandes = Commande::all();
        $this->fournisseurs=Fournisseur::all();

        
        return view('livewire.commande.index');
    }

    public function create()
    {
        $this->createMode=true;
       // dd($this->updateMode);
       
    }


    private function resetCreateForm(){
        $this->dateCommande= '';
        $this->dateProbableLivraison = '';
        $this->fournisseur_id = '';
        $this->produit_id=[];
        $this->quantite=[];
    }
    
    public function store()
    {
      //
       
        $commande=Commande::Create(
             [
            'dateCommande' => $this->dateCommande,
            'dateProbableLivraison' => $this->dateProbableLivraison,
            'fournisseur_id' => $this->fournisseur_id,
        ]);


        foreach ($this->inputs as $key => $value) {
            CommandeProduit::Create(
                [
                    'commande_id'=>$commande->id,
                    'quantite'=>$this->quantite[$key],
                    'produit_id'=>$this->produit_id[$key],
                ]
                );
        }
        $this->inputs = [];
        session()->flash('message', $this->commande_id ? 'Commande modifier.' : 'Commande creer.');

       
        $this->resetCreateForm();
        $this->createMode=false;
       
    }

    public function edit($id)
    {   $this->updateMode=true;
        $Commande = Commande::findOrFail($id);
        $this->commande_id=$Commande->id;
        $this->dateCommande= $Commande->dateCommande;
        $this->dateProbableLivraison = $Commande->dateProbableLivraison;
        $this->fournisseur_id = $Commande->fournisseur_id;

       $infos=CommandeProduit::where('commande_id',$Commande->id)->select('quantite','produit_id')->get();
      
       // dd($this->quantite);
        foreach($infos as $key=>$info)
        {
            array_push($this->quantite,$info->quantite);
            array_push($this->produit_id,$info->produit_id);
            array_push($this->inputs,$key);
        }
       
    }


    public function update($id){
        $commande=CommandeProduit::where('commande_id',$id)->get();

        foreach ($commande as $key => $value) {
           $value->update([
                'quantite'=>$this->quantite[$key],
                'produit_id'=>$this->produit_id[$key],
                'commande_id'=>$id,
            ]);
        }

        session()->flash('message', 'Commande modifier.');
        $this->resetCreateForm();
        $this->updateMode=false;
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
    }
}
