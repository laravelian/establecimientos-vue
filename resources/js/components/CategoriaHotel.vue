<template>
    <div class="container my-5">
        <h2>Hoteles</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="hotel in store.hoteles" v-bind:key="hotel.id">
                <div class="card">
                    <img :src="`storage/${hotel.imagen_principal}`" alt="">
                    <div class="card-body">
                        <h3 class="card-title text-primary fw-bold">{{ hotel.nombre }}</h3>
                        <p class="card-text">{{ hotel.direccion }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Horario:</span>
                            {{ hotel.apertura }} - {{ hotel.cierre }}
                        </p>
                        <RouterLink :to="{ name: 'establecimiento', params: { id: hotel.id } }">
                            <a class="btn btn-primary d-block">Ver Lugar</a>
                        </RouterLink>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, computed } from "vue"
import { useHotelStore } from '../store/hotel'

const store = useHotelStore();

axios.get('/api/categorias/hoteles')
    .then(respuesta => {
        store.add_hotel(respuesta.data)
    })

</script>