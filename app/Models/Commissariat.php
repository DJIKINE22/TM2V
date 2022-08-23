<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commissariat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'localite',
        'nomCommissaire',
        'prenomCommissaire',
        'matricule',
        'adresse',
        'email',
        'password',
        'telephone',
        'userId',
        
    ];
    public function users(){
        return $this->belongsTo(User::class, 'userId');// belongsTo= appartenir à
    }
}
