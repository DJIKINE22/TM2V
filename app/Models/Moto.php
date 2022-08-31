<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_ch',
        'marque',
        'modele',
        'carburant',
        'couleur',
        'photo',
        'vehicule',
        
       
        
    ];
    public function perte(){
        return $this->HasMany(pertes::class, 'vehicule');
    }
}
