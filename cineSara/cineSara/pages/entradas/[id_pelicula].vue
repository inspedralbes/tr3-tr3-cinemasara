<template>
    <div v-if="showPelicula">
        <h1>Sesion</h1>
            <fichaPelicula :pelicula="pelicula" />
        <h1>Pati Butacas</h1>
            <patioButacas class="butacas"/>
    </div>
</template>

<script>
import { useStore } from "../stores/index";
import { getPeliculaId } from "~/services/communicationManager";

export default {
    data() {
        return {
            pelicula: {},
            showPelicula: false
        }
    },
    mounted() {
        const store = useStore();
        let pelicula = store.selectPelicula;

        if (pelicula != undefined) {
            this.pelicula = store.selectPelicula;
            
            this.showPelicula = true;
        } else if (this.$route.params.id_pelicula != undefined) {
            getPeliculaId(this.$route.params.id_pelicula).then((response) => {
                this.pelicula = response;
                store.setSelectPelicula(response);
                store.setIdPelicula(response.id);

                this.showPelicula = true;
            }).catch((error) => {
                console.log(error);
            });
        } else {
            console.error("El parámetro id no está definido");
        }
    }
}


</script>