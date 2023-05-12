import { defineStore } from "pinia";

export const useEstablecimientosStore = defineStore("establecimientos", {
  state: () => ({
    establecimientos: [],
  }),
  getters: {},
  actions: {
    add_establecimientos(value) {
      this.establecimientos = value;
    },
  },
});
