<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commissaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'userId',
        'status',
    ];
    public function users(){
        return $this->belongsTo(User::class, 'userId');// belongsTo= appartenir à
    }
}
