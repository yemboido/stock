<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fournisseur;
use App\Models\InfoEntrer;
class Entrer extends Model
{
    use HasFactory;
    protected $fillable=['dateEntrer','user_id','fournisseur_id'];
    protected $table='entrers';

    public function fournisseur(){
    	return $this->belongsTo(Fournisseur::class,'fournisseur_id');
    }

    public function info_entrer(){
        return $this->hasMany(InfoEntrer::class,'id');
    }
}
