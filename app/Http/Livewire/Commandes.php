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
    public $i = 1;

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
    }
    
    public function store()
    {
      //
       
        $commande=Commande::updateOrCreate(
             [
            'dateCommande' => $this->dateCommande,
            'dateProbableLivraison' => $this->dateProbableLivraison,
            'fournisseur_id' => $this->fournisseur_id,
        ]);


        foreach ($this->quantite as $key => $value) {
            CommandeProduit::updateOrCreate(
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
        $this->updateMode=false;
    }

    public function edit($id)
    {   $this->updateMode=$this->createMode=true;
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
            array_push($this->inputs,$key-1);
        }
        
    }
    
    public function delete($id)
    {
        Commande::find($id)->delete();
        session()->flash('message', 'Commande supprimer.');
    }
}
