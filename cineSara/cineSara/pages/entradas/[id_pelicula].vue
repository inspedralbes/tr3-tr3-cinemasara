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
import fichaPelicula from "../components/fichaPelicula.vue";
import ficheroSesiones from "../components/ficheroSesiones.vue";
import patioButacas from "../components/patioButacas.vue";
    export default {
        components: {
            fichaPelicula,
            ficheroSesiones,
            patioButacas
            
        },
        props: {
        pelicula: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            sesion: {},
        }
    },
    async mounted() {
        this.getSesion();
    },
    computed: {
        pelicula(){
            const store = useStore();
            return store.selectPelicula;
        },
        comprarEntrada(){

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