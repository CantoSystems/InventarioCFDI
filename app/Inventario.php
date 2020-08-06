<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable=['clave','clave_interna','costo_unitario','descripcion', 'cantidad'];
}
