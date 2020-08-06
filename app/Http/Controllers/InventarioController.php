<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Inventario;
use Session;
use App\Imports\InventarioImport;
use App\Exports\InventarioExport;
use Maatwebsite\Excel\Facades\Excel;


class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('home');
    }

    public function importarxml(){
     return view('importarxml');
    }

    public function tratamientoxml(Request $request){
        $files = $request->file('archivossubidos');
        if($request->hasFile('archivossubidos'))
        {
            foreach ($files as $file) {
                
                $this->obtenerdatos($file);
            }
            return redirect()->action('InventarioController@exportarexcel');
        }


    }

    public function obtenerdatos($file){
        $xmlContents = file_get_contents($file);
        $xmlContents = \CfdiUtils\Cleaner\Cleaner::staticClean($xmlContents);
        $comprobante = \CfdiUtils\Cfdi::newFromString($xmlContents)->getQuickReader();
        // usando asignación de variable
        $conceptos = $comprobante->conceptos;
        foreach($conceptos() as $concepto) 
        {
            $valor_unitario= $concepto['valorunitario'];
            $cantidad= $concepto['cantidad'];
            $descripcion= $concepto['descripcion'];
            $clave= $concepto['claveprodserv'];
            $this->registro($valor_unitario,$cantidad,$descripcion,$clave);
        }
    }

    public function registro($valor_unitario,$cantidad,$descripcion,$clave){
    $producto= Inventario::where('clave',$clave)->first();
    if($producto)
    {
        $product= Inventario::where('clave',$clave)->first();
        $can=$product->cantidad;
        $product->costo_unitario= floatval($valor_unitario);
        $product->cantidad= $cantidad+$can;
        $product->descripcion= $descripcion;
        $product->save();
    }
    else{
        $product= new Inventario;
        $product->clave= $clave;
        $product->costo_unitario= floatval($valor_unitario);
        $product->cantidad= $cantidad;
        $product->descripcion= $descripcion;
        $product->save();
    }
    }

    public function importarexcel(){
    return view('importarexcel');
    }
    public function exportarexcel(){
        return view('exportarinventario'); 
    }
    public function export(){
        return Excel::download(new InventarioExport, 'inventario.xlsx');
    }
   
    public function import(){
        $inventario= Inventario::all();
        foreach ($inventario as $invent) {
            $invent->delete();
         } 
        Excel::import(new InventarioImport,request()->file('file'));    
        return redirect()->action('InventarioController@exportarexcel');
    }

    public function limpiarbase(){
        $inventario= Inventario::all();
        foreach ($inventario as $invent) {
            $invent->delete();
         } 
         return redirect()->action('InventarioController@index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
