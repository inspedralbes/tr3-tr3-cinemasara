<template>
    <div>
        <h1>Sesion</h1>
            <fichaPelicula :pelicula="pelicula" :sesion="sesion"/>
        <h1>Pati Butacas</h1>
            <patioButacas class="butacas"/>
    </div>
</template>

<script>
import { useStore } from "../stores/index";
import ficheroSesiones from "@/components/ficheroSesiones.vue";
import patioButacas from "@/components/patioButacas.vue";
    export default {
        components: {
            ficheroSesiones,
            patioButacas
            
        },
    data() {
        return {
            sesion: [],
        };
    },
    mounted() {
        this.getSesion();
    },
    methods: {
       async getSesion(){
            try{
                const response = await fetch(`http://localhost:8000/api/sesiones/${this.$route.params.id_pelicula}`)
                if(!response.ok){
                    throw new Error("No se pudo obtener la sesión");
                }                
                const data = await response.json();
                this.sesion = data;
            }catch(error){
                console.error("Error al obtener la sesión:", error);
            }    
        }
    },
    computed: {
        pelicula(){
            const store = useStore();
            return store.selectPelicula;
        }
    },
}


</script>