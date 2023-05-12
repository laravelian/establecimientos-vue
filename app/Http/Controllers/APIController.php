<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Establecimiento;
use App\Models\Imagen;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        $establecimiento = Establecimiento::with('categoria')->get();
        return response()->json($establecimiento);
    }
    //Metodo para obtener todas las categorias
    public function categorias()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    //Mustra los establecimientos de la categoria en especifico
    public function categoria(Categoria $categoria)
    {
        //with('categoria') es una forma de cargar los datos de relaciones entre tablas (relaciones belongsTo, hasOne, belongsToMany,) with llama el metodo que gobierna la relacion entre las tablas en los modelos
        $establecimientos = Establecimiento::where('categoria_id', $categoria->id)->with('categoria')->take(3)->get();
        return response()->json($establecimientos);
    }
    public function globales(Categoria $categoria)
    {
        //with('categoria') es una forma de cargar los datos de relaciones entre tablas (relaciones belongsTo, hasOne, belongsToMany,) with llama el metodo que gobierna la relacion entre las tablas en los modelos
        $establecimientos = Establecimiento::where('categoria_id', $categoria->id)->with('categoria')->get();
        return response()->json($establecimientos);
    }
    //Muestra un establecimiento en especifico
    public function show(Establecimiento $establecimiento)
    {
        $imagenes = Imagen::where('id_establecimiento', $establecimiento->uuid)->get();
        $establecimiento->imagenes = $imagenes;

        return response()->json($establecimiento);
    }
}
