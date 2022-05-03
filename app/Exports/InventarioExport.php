<?php

namespace App\Exports;

use App\Inventario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class InventarioExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Clave de articulo',
            'Clave de factura',
            'Descripcion del producto',
            'Existencias',
            'Costo Unitario',
            'Ultima Modificacion',
        ];
    }
    public function collection()
    {
        $users = DB::table('inventarios')->select('clave_articulo','clave_factura', 'descripcion','cantidad', 'costo_unitario', 'ultimaModificacion')->get();
        return $users;
    }
}
