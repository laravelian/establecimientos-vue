<template>
    <div id="map"></div>
</template>

<script setup>
import '/node_modules/leaflet/dist/leaflet.css'
import '/node_modules/leaflet/dist/leaflet.js'
//import '/node_modules/esri-leaflet/dist/esri-leaflet.js'
//import '/node_modules/esri-leaflet-vector/dist/esri-leaflet-vector.js'
//import '/node_modules/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css'
//import '/node_modules/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.js'

import { onMounted, computed } from 'vue'
import { useEstablecimientoStore } from '../store/establecimiento'

let map;
let store; 
let marker;
onMounted(() => {
    setTimeout(() => {
        store = computed(() => useEstablecimientoStore().establecimiento)
        map = L.map('map').setView([parseFloat(store.value.lat), parseFloat(store.value.lng)], 16);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        marker = new L.marker([parseFloat(store.value.lat), parseFloat(store.value.lng)], {
            autoPan: true,
        }).addTo(map)
            .bindPopup(store.value.nombre)
            .openPopup();
    }, 500)
})

</script>

<style scoped>
#map {
    height: 300px;
    width: 100%;
}
</style>