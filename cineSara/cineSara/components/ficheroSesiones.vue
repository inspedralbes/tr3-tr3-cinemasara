<template>
    <div v-if="sesion" >
        <p>{{ sesion.hora }}</p>
    </div>
</template>


<script>
import { getSesionesIdPelicula } from '../services/communicationManager.js';

    export default {
        props: {
            id_pelicula: {
                type: Number,
                required: true
            }
        },
        data() {
            return {
                sesion: {}
            }
        },
        mounted() {
            getSesionesIdPelicula(this.id_pelicula).then((response) => {
                this.sesion = response;
            }).catch((error) => {
                console.log(error);
            });
        }
    }
</script>