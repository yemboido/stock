<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoSortie extends Model
{
    use HasFactory;
    protected $fillable=['quantite','produit_id','sortie_id'];

    public function sortie(){
        return $this->belongsTo(Sortie::class,'sortie_id');
    }

    public function produit(){
        return $this->belongsTo(Produit::class,'produit_id');
    }
    
}
