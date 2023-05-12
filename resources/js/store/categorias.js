import { defineStore } from "pinia";

export const useCategoriasStore = defineStore("categorias", {
  state: () => ({
    categorias: [],
    categoria: "",
  }),
  getters: {},
  actions: {
    add_categorias(value) {
      this.categorias = value;
    },
    select_categoria(val) {
      this.categoria = val;
    },
  },
});
