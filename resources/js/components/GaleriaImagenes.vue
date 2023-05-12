<template>
    <h2 class="mt-4">Galería de Imágenes</h2>

    <ul class="row list-unstyled mt-4">
        <li class="col-md-4 mb-4" v-for="imagen in imagenes" v-bind:key="imagen.id">
            <a :href="`/storage/${imagen.ruta_imagen}`" data-lightbox="imagenes" data-title="Imagen Establecimiento">
                <img class="img-fluid" :src='`/storage/${imagen.ruta_imagen}`' alt="">
            </a>
        </li>
    </ul>

</template>

<script setup>
import lightbox from 'lightbox2';
import '/node_modules/lightbox2/dist/css/lightbox.css'

import { useEstablecimientoStore } from '../store/establecimiento';
import { computed } from 'vue'

const imagenes = computed(() => useEstablecimientoStore().establecimiento.imagenes)

</script>