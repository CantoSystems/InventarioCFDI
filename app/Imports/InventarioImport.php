<?php

namespace App\Imports;

use App\Inventario;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventarioImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventario([
            'clave' => $row['clave'],
            'clave_interna' => $row['clave_de_articulo'],
            'descripcion' => $row['descripcion_de_producto'],
            'cantidad' => $row['existencia'],
            'costo_unitario' => $row['costo_unitario'],
        ]);
    }
}
