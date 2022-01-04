<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Sortie extends Model
{
    use HasFactory;

    protected $fillable=['dateSortie','user_id','vendeur'];

    public function vendeur_info(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
