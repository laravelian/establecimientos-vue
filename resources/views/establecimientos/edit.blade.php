@extends('layouts.app')

@vite(['node_modules\dropzone\dist\dropzone.css', 'node_modules\dropzone\dist\dropzone-min.js'])

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Registrar Establecimiento</h1>

    <div class="mt-5 row justify-content-center">
        <form class="col-md-9 col-xs-12 card card-body"
            action="{{ route('establecimiento.update', ['establecimiento' => $establecimiento->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <fieldset class="border p-4">
                <legend class="text-primary">Nombre, Categoria e Imagen Principal</legend>

                <div class="form-group">
                    <label for="nombre">Nombre del Establecimiento</label>
                    <input type="text" id="nombre" class="form-control @error('nombre')
                            is-invalid
                        @enderror" placeholder="Nombre del Establecimiento" name="nombre"
                        value="{{ $establecimiento->nombre }}">

                    @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoría</label>

                    <select class="form-control @error('categoria_id')
                            is-invalid
                        @enderror" name="categoria_id" id="categoria_id">
                        <option value="" selected disabled>-- Seleccione --</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $establecimiento->categoria_id==$categoria->id ?
                            'selected' : ''
                            }}>{{ $categoria->nombre }}
                        </option>
                        @endforeach
                    </select>

                    @error('categoria_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen_principal">Imagen principal del Establecimiento</label>
                    <input type="file" id="imagen_principal" class="form-control @error('imagen_principal')
                            is-invalid
                        @enderror" name="imagen_principal" value="{{ old('imagen_principal') }}">

                    @error('imagen_principal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <img style="width:200px; margin-top:20px" src="/storage/{{ $establecimiento->imagen_principal }}"
                        alt="">
                </div>

            </fieldset>

            <fieldset class="border p-4 mt-5">
                <legend class="text-primary">Ubicación:</legend>

                <div class="form-group">

                    <label for="formbuscador">Coloca la Ubicación de tu Establecimiento</label>

                    <input type="text" id="formbuscador" class="form-control"
                        placeholder="Calle del Negocio o Establecimiento" value="{{ fake()->address }}">

                    <p class="text-secundary mt-5 mb-3 text-center">El asistente colocará una dirección estimada, mueve
                        el Pin hacia el lugar correcto </p>
                </div>

                <div class="form-group">
                    <div id="mapa" style="height: 400px;"></div>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>

                    <input type="text" id="direccion" name="direccion" class="form-control @error('direccion')
                            is-invalid
                        @enderror" placeholder="Dirección" value="{{ $establecimiento->direccion }}">

                    @error('direccion')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="colonia">Colonia</label>

                    <input type="text" id="colonia" name="colonia" class="form-control @error('colonia')
                            is-invalid
                        @enderror" placeholder="Dirección" value="{{ $establecimiento->colonia }}">

                    @error('colonia')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <input type="hidden" id="lat" name="lat" value="{{ $establecimiento->lat }}">
                <input type="hidden" id="lng" name="lng" value="{{ $establecimiento->lng }}">
            </fieldset>

            <fieldset class="border p-4 mt-5">
                <legend class="text-primary">Informacion del Establecimiento</legend>

                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" placeholder="Telefono del Establecimiento" class="form-control @error('telefono')
                            is-invalid
                        @enderror" value="{{ $establecimiento->telefono }}">

                    @error('telefono')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control @error('descripcion')
                            is-invalid
                        @enderror">{{ $establecimiento->descripcion }}</textarea>

                    @error('descripcion')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apertura">Hora de Apertura</label>
                    <input type="time" name="apertura" id="apertura" placeholder="Descripción del Establecimiento"
                        class="form-control @error('apertura')
                            is-invalid
                        @enderror" value="{{ $establecimiento->apertura }}">

                    @error('apertura')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cierre">Hora de Cierre</label>
                    <input type="time" name="cierre" id="cierre" placeholder="Descripción del Establecimiento" class="form-control @error('cierre')
                            is-invalid
                        @enderror" value="{{ $establecimiento->cierre }}">

                    @error('cierre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="border p-4 mt-5">
                <legend class="text-primary">Imagenes del Establecimiento:</legend>

                <div class="form-group">
                    <label for="imagenes">Imagenes</label>
                    <div id="dropzone" class="dropzone form-control"></div>
                </div>

                @if (count($imagenes)>0)
                @foreach ($imagenes as $imagen)
                    <input type="hidden" name="" class="galeria" value="{{ $imagen->ruta_imagen }}">
                @endforeach
                @endif

            </fieldset>

            <input type="hidden" id="uuid" name="uuid" value="{{ $establecimiento->uuid }}">

            <input type="submit" class="btn btn-primary mt-3 d-block" value="Guardar Cambios">
        </form>
    </div>

</div>
@endsection