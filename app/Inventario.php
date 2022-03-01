<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model{
    protected $fillable = ['clave_articulo','clave_factura','costo_unitario','descripcion','cantidad','ultimaModificacion'];
}
