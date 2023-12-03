<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = ProductoModel::all();
        return response()->json($productos);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('crear',['mensaje'=>'CREAR PRODUCTO']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $this->datos_form($request);
        $campo_completados = $this->camposRellenos($datos);
        
        if(!$campo_completados)
            return view('crear',['estado' => 'error', 'mensaje'=> 'Todods los campos son obligatorios']);
        
        $producto = new ProductoModel();
        $producto->nombre = $datos['nombre'];
        $producto->descripcion = $datos['descripcion'];
        $producto->precio = $datos['precio'];
        $producto->tipo = $datos['tipo'];
        $producto->color = $datos['color'];
        $producto->save();
        return view('crear',['estado' => 'ok', 'mensaje'=> 'Producto creado']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = ProductoModel::find($id);
        if(!$producto)
            return view('editar',['estado'=>'error','mensaje'=>'No existe el producto']);
        
        return view('editar',['estado'=>'ok','mensaje'=>'Modificar producto','producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = ProductoModel::find($id);
        if(!$producto)
            return view('show',['estado'=>'error','mensaje'=>'No se encontro el producto']);

        $datos = $this->datos_form($request);
        $campo_completados = $this->camposRellenos($datos);
        
        if(!$campo_completados)
            return view('editar',['estado' => 'error', 'mensaje'=> 'Todos los campos son obligatorios']);

        $producto->nombre = $datos['nombre'];
        $producto->descripcion = $datos['descripcion'];
        $producto->precio = $datos['precio'];
        $producto->tipo = $datos['tipo'];
        $producto->color = $datos['color'];
        $producto->save();
        return view('show',['estado' => 'ok', 'mensaje'=> 'Producto editado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = ProductoModel::find($id);
        if(!$producto)
            return response()->json(['mensaje'=>'no existe']);
        $producto->delete();
        return response()->json(['mensaje'=>'borrado']);
    }

    public function datos_form(Request $request)
    {
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $tipo = $request->input('tipo');
        $color = $request->input('color');

        $datos = [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "tipo"=> $tipo,
            "color"=> $color
        ];
        return $datos;
    }
    public function camposRellenos($datos){

        if(isset($datos['nombre']) && isset($datos['descripcion']) && isset($datos['precio']) && isset($datos['tipo']) && isset($datos['color']))
            return true;

        return false;
    }
}
