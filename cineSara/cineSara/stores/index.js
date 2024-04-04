import { defineStore } from 'pinia'

export const useStore = defineStore('store', {
    state: () => ({
        selectPelicula: [],
    }),
    actions: {
        setPeliculaId(movie) {
            
            this.selectPelicula = movie;
        },
        

    }
})