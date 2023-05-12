<template>
    <div>
        <nav class="d-flex flex-column flex-md-row container justify-content-md-center">
            <a @click="fetchData">Todos</a>
            <a v-for="categoria in categorias" :key="categoria.id" @click="seleccionarCategoria(categoria)">{{
                categoria.nombre
            }}</a>
        </nav>
    </div>
</template>

<script setup>
import { useCategoriasStore } from "../store/categorias";
import { useEstablecimientosStore } from "../store/establecimientos";
import { computed, watch } from 'vue'

const store = useCategoriasStore();
const repintado = useEstablecimientosStore();

axios.get('/api/categorias')
    .then(respuesta => {
        store.add_categorias(respuesta.data)
    })

const categorias = computed(() => store.categorias)
const local = computed(() => store.categoria)

function seleccionarCategoria(categoria) {
    store.select_categoria(categoria.slug)
}

watch(local, () => {
    axios.get('/api/categorias/' + local.value)
        .then(respuesta => {
            repintado.add_establecimientos(respuesta.data)
        })
})

async function fetchData() {
    try {
        const response = await axios.get('/api/establecimientos');
        repintado.add_establecimientos(response.data)
        store.select_categoria('')

    } catch (error) {
        console.log('error');
    }
}

</script>

<style scoped>
div {
    background-color: #322080;
}

a {
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    padding: 0.5rem 2rem;
    text-align: center;
    flex: 1;
}

nav a:hover {
    color: white;
    cursor: pointer;
}

nav a:nth-child(1) {
    color: #ffffff;
    background-color: #1f2861;
    text-decoration: none;
}

nav a:nth-child(2) {
    color: #43a854;
    background-color: #1f2861;
    text-decoration: none;
}

nav a:nth-child(3) {
    color: #ad8a32;
    background-color: #1f2861;
    text-decoration: none;
}

nav a:nth-child(4) {
    color: #a04055;
    background-color: #1f2861;
    text-decoration: none;
}

nav a:nth-child(5) {
    color: #416aac;
    background-color: #1f2861;
    text-decoration: none;
}

nav a:nth-child(6) {
    color: #a06a3e;
    background-color: #1f2861;
    text-decoration: none;
}

nav a:nth-child(7) {
    color: #a05c3f;
    background-color: #1f2861;
    text-decoration: none;
}

nav a:nth-child(8) {
    color: #9641a3;
    background-color: #1f2861;
    text-decoration: none;
}
</style>