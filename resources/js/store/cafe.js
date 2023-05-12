import { defineStore } from "pinia"

export const useCafeStore = defineStore("cafe", {
    state: () => ({
        cafes:[]
    }),
    getters: {},
    actions: {
        add_cafe(cafes){
            this.cafes = cafes;
        }
    },
})

