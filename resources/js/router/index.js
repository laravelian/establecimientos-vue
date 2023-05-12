import { createRouter, createWebHistory } from "vue-router";
import InicioEstablecimientos from "../components/InicioEstablecimientos.vue";
import MostrarEstablecimiento from "../components/MostrarEstablecimiento.vue";

const routes = [
  { path: "/", name: "home", component: InicioEstablecimientos },
  {
    path: "/establecimiento/:id",
    name: "establecimiento",
    component: MostrarEstablecimiento,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
