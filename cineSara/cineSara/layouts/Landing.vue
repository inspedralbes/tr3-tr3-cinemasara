<template>
  <div class="container">
    <h1>PELÍCULAS</h1>
    <div v-if="peliculas.length" class="pelicula-container">
      <div v-for="pelicula in peliculas" :key="pelicula.id_pelicula" class="pelicula" >
        <nuxt-link :to="{ name: 'entradas-id_pelicula', params: { id_pelicula: pelicula.id_pelicula}}" class="nav-link" >
          <fichaPelicula :pelicula="pelicula"/>
        </nuxt-link>
      </div>   
    </div>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  text-align: center;
}

.pelicula-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 20px;
}

.pelicula {
  background-color: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>

<script>
import { useStore } from '../stores/index';
import {getPeliculas} from '../services/communicationManager.js';

export default {
  data() {
    return {
      peliculas: [],
    }
  },
  mounted() {
    getPeliculas().then((response) => {
      //pelicula : titol, descriocio, cartell, duracio, any, director, id_pelicula
      this.peliculas = response;
      return pelicula;
    }).catch((error) => {
      console.log(error);
    });
  },
  
    // selectPelicula(pelicula){
    //   useStore().setPeliculaId(pelicula.id_pelicula);
    //   this.$router.push({
    //     path: `/entradas/${pelicula.id_pelicula}`,
        
    //   });
    // }
  
}
</script>
