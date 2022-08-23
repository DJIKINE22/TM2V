<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'matricule',
        'adresse',
        'email',
        'password',
        'telephone',
        'commissariat',
        'userId',
        'status',
    ];
    public function users(){
        return $this->belongsTo(User::class, 'userId');// belongsTo= appartenir à
    }
    public function commissariat(){
        return $this->belongsTo(commissariat::class, 'commissariat');// belongsTo= appartenir à
    }
}
