import { defineStore } from "pinia";

export const useEstablecimientoStore = defineStore("establecimiento", {
  state: () => ({
    establecimiento: {},
  }),
  getters: {},
  actions: {
    add_establecimiento(value) {
      this.establecimiento = value;
    },
  },
});
