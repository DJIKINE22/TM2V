<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'status',
        'userId',
    ];
    public function users(){
        return $this->belongsTo(User::class, 'userId');// belongsTo= appartenir à
    }
}
