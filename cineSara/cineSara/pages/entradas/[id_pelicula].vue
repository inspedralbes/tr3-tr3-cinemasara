<template>
    <div>
        <h1>Sesion</h1>
            <fichaPelicula :pelicula="pelicula"/>
            <ficheroSesiones :sesiones="sesiones" :pelicula="pelicula"/>
        <h1>Pati Butacas</h1>
    </div>
</template>

<script>
import { useStore } from "../stores/index";

    export default {
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
       async getSesion(){
            try{
                const response = await fetch(`http://localhost:8000/api/sesiones/${this.id_pelicula}`)
                
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