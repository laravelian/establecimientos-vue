import { defineStore } from "pinia";

export const useHotelStore = defineStore("hotel", {
  state: () => ({
    hoteles: [],
  }),
  getters: {},
  actions: {
    add_hotel(hoteles) {
      this.hoteles = hoteles;
    },
  },
});
