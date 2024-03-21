<template>
    <div>
        <h1>Sesion</h1>
            <fichaPelicula :pelicula="pelicula"/>
            
        <h1>Pati Butacas</h1>
    </div>
</template>

<script>
import { useStore } from "../stores/index";
import fichaPelicula from "../components/fichaPelicula.vue";
import ficheroSesiones from "../components/ficheroSesiones.vue";
    export default {
        components: {
            fichaPelicula,
            ficheroSesiones
        },
        props: {
        pelicula: {
            type: Object,
            required: true
        }
    },
    mounted() {
        this.getSesion();
    },
    computed: {
        pelicula(){
            const store = useStore();
            return store.selectPelicula;
        }
    },
    methods: {
       async getSesion(){
            try{
                const response = await fetch(`http://localhost:8000/api/sesiones/${this.$route.params.id_pelicula}`)
                
                if(!response.ok){
                    throw new Error(data.message);
                }                
                const data = await response.json();
                this.sesion = data;
            }catch(error){
                console.log(error);
            }    
        }
    },
}


</script>