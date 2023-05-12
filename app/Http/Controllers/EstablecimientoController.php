<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Models\Imagen;
use Intervention\Image\Facades\Image;

class EstablecimientoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('establecimientos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion

        $data = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen_principal' => 'required|image|max:1000',
            'direccion' => 'required',
            'colonia' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'
        ]);

        //Guardar la imagen
        $ruta_imagen = $request['imagen_principal']->store('principales', 'public');

        //Resize a la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(800, 600);
        $img->save();

        //Guardar en la BD
        $establecimiento = new Establecimiento($data);
        $establecimiento->imagen_principal = $ruta_imagen;
        $establecimiento->user_id = auth()->user()->id;
        $establecimiento->save();

        return back()->with('estado', 'Tu información se Guardo Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Establecimiento $establecimiento)
    {
        $establecimiento = auth()->user()->establecimiento;
        $categorias = Categoria::all();

        //Obtener las imagenes del Establecimiento
        $imagenes = Imagen::where('id_establecimiento', $establecimiento->uuid)->get();

        return view('establecimientos.edit', compact('categorias', 'establecimiento', 'imagenes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        $this->authorize('update', $establecimiento);

        $data = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen_principal' => 'image|max:1000',
            'direccion' => 'required',
            'colonia' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'
        ]);

        $establecimiento->nombre = $data['nombre'];
        $establecimiento->categoria_id = $data['categoria_id'];
        $establecimiento->direccion = $data['direccion'];
        $establecimiento->colonia = $data['colonia'];
        $establecimiento->lat = $data['lat'];
        $establecimiento->lng = $data['lng'];
        $establecimiento->telefono = $data['telefono'];
        $establecimiento->descripcion = $data['descripcion'];
        $establecimiento->apertura = $data['apertura'];
        $establecimiento->cierre = $data['cierre'];
        $establecimiento->uuid = $data['uuid'];

        if ($request['imagen_principal']) {
            $ruta_imagen = $request['imagen_principal']->store('principales', 'public');

            $img = Image::make(public_path("storage/{ruta_imagen}"))->fit(800, 600);
            $img->save();

            $establecimiento->imagen_principal = $ruta_imagen;
        }

        $establecimiento->save();

        return back()->with('estado', 'Tu informacion se almacenó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Establecimiento $establecimiento)
    {
        //
    }
}
