<template>
    <div class="container my-5">
        <h2>Cafés</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="cafe in store.cafes" :key="cafe.id">
                <div class="card">
                    <img :src="`storage/${cafe.imagen_principal}`" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title text-primary fw-bold">{{ cafe.nombre }}</h3>
                        <p class="card-text">{{ cafe.direccion }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Horario:</span>
                            {{ cafe.apertura }} - {{ cafe.cierre }}
                        </p>
                        <RouterLink :to="{ name: 'establecimiento', params: { id: cafe.id } }">
                            <a class="btn btn-primary d-block">Ver Lugar</a>
                        </RouterLink>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, onMounted } from "vue"
import { useCafeStore } from "../store/cafe"
let store = useCafeStore();

onMounted(() => {
    async function fetchData() {
        try {
            const response = await axios.get('/api/categorias/cafe');
            store.add_cafe(response.data)
            console.log(response.data)
        } catch (error) {
            console.log('error');
        }
    }
    fetchData()
})




</script>