<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaJuridica extends Model
{
    use HasFactory;

     protected $fillable = ['nit'];
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
}
