<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //leer las rutas por el nombre de cualquiera de las columnas que integra la tabla categoria, y no por /categorias/{categoria(!esto lee la ruta por el id de la tabla categorias)}
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function establecimientos()
    {
        return $this->hasMany(Establecimiento::class);
    }
}
