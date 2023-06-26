<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];
    
    public function personaNatural()
    {
        return $this->hasOne(PersonaNatural::class);
    }
    public function personaJuridica()
    {
        return $this->hasOne(PersonaJuridica::class);
    }
}
