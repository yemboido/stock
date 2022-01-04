<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fournisseur;
class Commande extends Model
{
    use HasFactory;

    protected $fillable=['dateCommande','dateProbableLivraison','fournisseur_id'];


    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class,'fournisseur_id');
    }
}
