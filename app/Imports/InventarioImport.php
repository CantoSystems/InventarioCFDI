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
            'clave_articulo' => $row['clave_de_articulo'],
            'clave_factura' => $row['clave_de_factura'],
            'descripcion' => $row['descripcion_del_producto'],
            'cantidad' => $row['existencias'],
            'costo_unitario' => $row['costo_unitario'],
        ]);
    }
}
