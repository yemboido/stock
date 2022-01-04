<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use App\Models\Entrer;
class InfoEntrer extends Model
{
    use HasFactory;

    protected $fillable=['quantite','produit_id','entrer_id'];

    public function produit(){
        return $this->belongsTo(Produit::class,'produit_id');
    }

    public function entrer(){
        return $this->belongsTo(Entrer::class,'entrer_id');
    }
}
