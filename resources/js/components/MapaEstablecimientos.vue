<template>
    <l-map style="height: 600px" :zoom="geo.zoom" :center="geo.center">
        <l-tile-layer :url="geo.url" :attribution="geo.attribution"></l-tile-layer>
        <l-marker v-for="establecimiento in establecimientos" :key="establecimiento.id"
            :lat-lng="obtenerCoordenadas(establecimiento)" :icon="iconoEstablecimiento(establecimiento)" @click="redireccionar(establecimiento)">
            <l-tooltip>
                <div>{{ establecimiento.nombre }} - {{ establecimiento.categoria.nombre }}</div>
            </l-tooltip>
        </l-marker>
    </l-map>
</template>

<script setup>
import '/node_modules/leaflet/dist/leaflet.css'
import '/node_modules/leaflet/dist/leaflet.js'
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from '@vue-leaflet/vue-leaflet';
import { computed, reactive, ref } from 'vue'
import { useEstablecimientosStore } from '../store/establecimientos';
import { useRouter } from 'vue-router';


let store = useEstablecimientosStore();
let establecimientos = computed(() => store.establecimientos)
let router = useRouter();

async function fetchData() {
    try {
        const response = await axios.get('/api/establecimientos');
        store.add_establecimientos(response.data)
    } catch (error) {
        console.log('error');
    }
}

fetchData()

const geo = reactive({
    url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    attribution:
        '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    zoom: 15,
    center: [10.486477661652492, -66.86825866445622],
    markerLatLng: [51.504, -0.159]
})

function obtenerCoordenadas(coordenadas) {
    return {
        lat: coordenadas.lat,
        lng: coordenadas.lng
    }
}
function iconoEstablecimiento(icono) {
    let slug = icono.categoria.slug;
    return L.icon({
        iconUrl: 'images/iconos/' + slug + '.png',
        iconSize: [40, 40]
    })
}
function redireccionar(enlace){
    router.push({ name: 'establecimiento', params: { id: enlace.id } })
}


</script>
  
<style>
.map {
    width: 100%;
}
</style>
  