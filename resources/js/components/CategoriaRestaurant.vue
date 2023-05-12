<template>
    <div class="container my-5">
        <h2>Restaurantes</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="restaurant in store.restaurantes" :key="restaurant.id">
                <div class="card">
                    <img :src="`storage/${restaurant.imagen_principal}`" alt="">
                    <div class="card-body">
                        <h3 class="card-title text-primary fw-bold">{{ restaurant.nombre }}</h3>
                        <p class="card-text">{{ restaurant.direccion }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Horario:</span>
                            {{ restaurant.apertura }} - {{ restaurant.cierre }}
                        </p>
                        <RouterLink :to="{ name: 'establecimiento', params: { id: restaurant.id } }">
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
import { useRestaurantStore } from "../store/restaurant";

const store = useRestaurantStore();
let restaurantes = computed(() => { store.restaurantes })

axios.get('/api/categorias/restaurant')
    .then(respuesta => {
        store.add_restaurant(respuesta.data);
    })

</script>s