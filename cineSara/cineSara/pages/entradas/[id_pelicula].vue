<template>
    <div v-if="showPelicula" class="container">
        <h1>Sesion</h1>
        <div class="content-wrapper">
            <div class="container-pelicula">
                <fichaPelicula :pelicula="pelicula" />
            </div>
            <div class="container-butacas">
                <h1>Pati Butacas</h1>
                <patioButacas class="butacas"/>
            </div>
        </div>
    </div>
</template>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.container h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.content-wrapper {
    display: flex;
    justify-content: left; /* Espaciado entre los elementos */
    width: 100%;
    gap: 10%;

}




/* Estilos específicos para el componente "patioButacas" */
.container-butacas {
    background-color: #f2f2f2;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>


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