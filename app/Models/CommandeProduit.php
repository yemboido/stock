<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use App\Models\Commande;

use App\Models\Entree;

class CommandeProduit extends Model
{
    use HasFactory;
    protected $fillable=['quantite','produit_id','commande_id'];

    public function produit(){
    	return $this->belongsTo(Produit::class,'produit_id');
    }

    public function commande(){
    	return $this->belongsTo(Commande::class,'commande_id');
    }

    public function entree(){
    	return $this->hasMany(Entree::class);
    }
}
