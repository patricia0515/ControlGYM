<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'chip',
        'nombre',
        'estrato',
        'direccion',
        'matricula',
        'codigo_catastral',
        'destino_catrastral',
        
    ];

    public function propietarios()
    {
        return $this->belongsToMany('App\Models\Persona');
    }
    public function servicios()
    {
        return $this->hasMany(SevicioPublico::class);
    }
}
