<template>
    <div>
        <h1>Sesion</h1>
            <fichaPelicula :pelicula="pelicula"/>
            <div v-if="sesionPelicula().length" class="sesion-container">
                <div v-for="sesion in sesionPelicula()" :key="sesion.id_sesion" class="sesion">
                    <p>{{ sesion.dia }}</p>
                    <p>{{ sesion.hora }}</p>
                    
                </div>

        </div>

        <h1>Pati Butacas</h1>
    </div>
</template>

<script>
import { useStore } from "../stores/index";
import { getSesion } from "~/services/communicationManager";   

    export default {
        mounted(){
            getSesion().then((response) => {
                this.sesiones = response;
            }).catch((error) => {
                console.log(error);
            });  
        },
        props: {
        pelicula: {
            type: Object,
            required: true
        }
    },
    computed: {
        pelicula(){
            const store = useStore();
            return store.selectPelicula;
        }
    },
    methods: {
        sesionPelicula(){
            if(this.sesiones.length){
                return this.sesiones.filter(sesion => sesion.id_pelicula === this.pelicula.id_pelicula)
            }
        }
    
    }
 
}


</script>