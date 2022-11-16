<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioPublico extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'empresa',
        'cuenta_contrato',
        'medidor',
        'ruta',
        'clase_uso',
        'referencia',
        'fecha_estimada_pago',
        'predio_id',
    ];
    
}
