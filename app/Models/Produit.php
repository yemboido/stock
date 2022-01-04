<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InfoEntrer;
use App\Models\Categorie;
class Produit extends Model
{
    use HasFactory;

    protected $fillable=['libelle','image','prixAchat','prixVente','prixRevendeur','description','categorie_id',
    'quantite','alerte'
	];

    public function infoEntrer(){
        return $this->hasMany(InfoEntrer::class,'id');
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class,'categorie_id');
    }
}
