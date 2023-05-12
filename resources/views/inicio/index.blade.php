@extends('layouts.app')
@vite(['node_modules\leaflet\dist\leaflet.css', 'node_modules\leaflet\dist\leaflet.js', 'node_modules\esri-leaflet\dist\esri-leaflet.js', 'node_modules\esri-leaflet-geocoder\dist\esri-leaflet-geocoder.js', 'node_modules\esri-leaflet-vector\dist\esri-leaflet-vector.js', 'node_modules\esri-leaflet-geocoder\dist\esri-leaflet-geocoder.css', 'node_modules\dropzone\dist\dropzone.css', 'node_modules\dropzone\dist\dropzone-min.js', 'node_modules\lightbox2\dist\css\lightbox.css', 'node_modules\lightbox2\dist\js\lightbox.js'])
@section('content')
    <pagina-inicio></pagina-inicio>
@endsection
