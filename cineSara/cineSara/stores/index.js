import { defineStore } from 'pinia'

export const useStore = defineStore('store', {
    state: () => ({
        todas_peliculas: [],
        todas_sesiones: [],
        selectPelicula: {},
        selectSesion: {},
        id_pelicula: Number,
        id_sesion: Number,
        asientosSelects: [],
        asientosOcupados: [],
    }),
    actions: {
        setTodasPeliculas(peliculas) {
            this.todas_peliculas = peliculas
        },
        setTodasSesiones(sesiones) {
            this.todas_sesiones = sesiones
        },
        setSelectPelicula(pelicula) {
            this.selectPelicula = pelicula
        },
        setSelectSesion(sesion) {
            this.selectSesion = sesion
        },
        setIdPelicula(id) {
            this.id_pelicula = id
        },
        setIdSesion(id) {
            this.id_sesion = id
        },
        setAsientosSelects(asientos) {
            this.asientosSelects = asientos
        },
        setAsientosOcupados(asientos) {
            this.asientosOcupados = asientos
        }       
    }
})