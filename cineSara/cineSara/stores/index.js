import { defineStore } from 'pinia'

export const useStore = defineStore('store', {
    state: () => ({
        peliculaId: null,
    }),
    getters: {
        getSelectPeliculaId() {
            return this.peliculaId
        }
    },
    actions: {
        setPeliculaId(id) {
            this.peliculaId = id
        }
    }
})