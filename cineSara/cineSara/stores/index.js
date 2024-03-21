import { defineStore } from 'pinia'

export const useStore = defineStore('store', {
    state: () => ({
        selectPelicula: null,
    }),
    actions: {
        setPeliculaId(movie) {
            
            this.selectPelicula = movie
        },
        

    }
})