<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaNatural extends Model
{
    use HasFactory;
    protected $fillable = ['dni'];


    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
