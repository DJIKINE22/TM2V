<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perte extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date_decla',
        'user',
        'vehicule',
        
    ];
    public function users(){
        return $this->belongsTo(User::class, 'user');// belongsTo= appartenir à
    }
    public function vehicules(){
        return $this->belongsTo(Vehicule::class, 'vehicule');// belongsTo= appartenir à
    }
}
