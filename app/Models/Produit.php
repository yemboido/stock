<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable=['libelle','image','prixAchat','prixVente','prixRevendeur','description','categorie_id'];
}
