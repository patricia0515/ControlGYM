<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'email',
        'nombre',
        'celular', 
        'apellido',
        'direccion',
        'tipo_persona',
        'tipo_documento',
        'numero_documento',
    ];

    public function predios()
    {
        return $this->belongsToMany('App\Models\Predio');
    }

}
