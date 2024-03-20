<template>
    <div>
        <h1>Sesion</h1>
        <button @click="console.log(this.pelicula)">A</button>
            <fichaPelicula :pelicula="{pelicula}"/>


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
 
}


</script>