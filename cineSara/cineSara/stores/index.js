import { defineStore } from 'pinia'

export const useStore = defineStore('store', {
    state: () => ({
        peliculaId: null,
    }),
    actions: {
        setPeliculaId(id) {
            this.peliculaId = id
        }

    }
})