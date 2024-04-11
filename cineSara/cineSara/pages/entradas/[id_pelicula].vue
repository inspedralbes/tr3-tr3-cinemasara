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
    padding: 10px;
}

.container h1 {
    font-size: 20px; 
    margin-bottom: 15px; 
}

.content-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.container-pelicula,
.container-butacas {
    width: 90%; 
    margin-bottom: 15px; 
}

.container-butacas {
    background-color: #f2f2f2;
    border-radius: 10px;
    padding: 15px; 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

@media only screen and (min-width: 600px) {
    .container {
        padding: 20px; 
    }

    .container h1 {
        font-size: 24px; 
    }

    .content-wrapper {
        flex-direction: row;
        justify-content: space-between;
        gap: 20px;
    }

    .container-pelicula,
    .container-butacas {
        width: 45%;
        margin-bottom: 0;
    }
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