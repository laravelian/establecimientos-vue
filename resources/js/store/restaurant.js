import { defineStore } from "pinia";

export const useRestaurantStore = defineStore("restaurant", {
  state: () => ({
    restaurantes: [],
  }),
  getters: {},
  actions: {
    add_restaurant(restaurantes) {
      this.restaurantes = restaurantes;
    },
  },
});
