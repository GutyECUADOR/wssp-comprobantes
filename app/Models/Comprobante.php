<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_pedido',
        'nombre_cliente',
        'banco',
        'comprobante_file',
    ];
}
