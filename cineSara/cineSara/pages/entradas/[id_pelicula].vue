<template>
    <div>
        <h1>Sesion</h1>
        <button @click="console.log(pelicula)">A</button>
            <fichaPelicula :pelicula="pelicula"/>


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
    }
 
}


</script>