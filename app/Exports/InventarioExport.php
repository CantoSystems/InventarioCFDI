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
        ];
    }
    public function collection()
    {
        $users = DB::table('Inventarios')->select('clave_interna','clave', 'descripcion','cantidad', 'costo_unitario')->get();
        return $users;
    }
}
