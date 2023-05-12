<template>
    <div class="container my-5">
        <h2 class="text-center mb-5">{{ store.establecimiento.nombre }}</h2>

        <div class="row align-items-start">
            <div class="col-md-8 order-2">
                <img :src="`../storage/${store.establecimiento.imagen_principal}`" class="img-fluid" alt="">
                <p class="mt-3">{{ store.establecimiento.descripcion }}</p>
                <galeria-imagenes></galeria-imagenes>
            </div>

            <aside class="col-md-4 order-1">
                <div>
                    <mapa-ubicacion></mapa-ubicacion>
                </div>
                <div class="p-4 bg-primary">
                    <h2 class="text-center text-white mt-2 mb-4">Más Información</h2>
                    <p class="text-white mt-1">
                        <span class="fw-bold">Ubicación:</span>
                        {{ store.establecimiento.direccion }}
                    </p>
                    <p class="text-white mt-1">
                        <span class="fw-bold">Colonia:</span>
                        {{ store.establecimiento.colonia }}
                    </p>
                    <p class="text-white mt-1">
                        <span class="fw-bold">Horario:</span>
                        {{ store.establecimiento.apertura }} - {{ store.establecimiento.cierre }}
                    </p>
                    <p class="text-white mt-1">
                        <span class="fw-bold">Teléfono:</span>
                        {{ store.establecimiento.telefono }}
                    </p>
                </div>
            </aside>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { useEstablecimientoStore } from '../store/establecimiento';
import MapaUbicacion from './MapaUbicacion.vue';
import GaleriaImagenes from './GaleriaImagenes.vue';

const id = useRoute().params.id
const store = useEstablecimientoStore();

onMounted(() => {

    axios.get('/api/establecimientos/' + id)
        .then(respuesta => {
            store.add_establecimiento(respuesta.data)
        })
})
</script>

<style scoped>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}</style>