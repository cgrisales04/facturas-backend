<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = "FACTURA";
    protected $id  = "ID_FACTURA";
    public $timestaps = false;

    protected $fillable = [
        'NUMERO',
        'FECHA',
        'VALOR_NETO',
        'VALOR_IVA',
        'VALOR_TOTAL',
        'ID_ACTIVO',
        'ID_PROVEEDOR',
        'ID_ETAPA',
        'ID_GASTO'
    ];
}
