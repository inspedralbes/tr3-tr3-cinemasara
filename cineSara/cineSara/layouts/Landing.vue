<template>
  <div class="container">
    <h1 class="titol">PELÍCULAS</h1>
    <div v-if="peliculas.length" class="pelicula-container">
      <div v-for="pelicula in peliculas" :key="pelicula.id_pelicula" class="pelicula" >
        <nuxt-link :to="{ name: 'entradas-id_pelicula', params: { id_pelicula: pelicula.id_pelicula}}" 
          class="nav-link custom-link">
          <fichaPelicula  :pelicula="pelicula" @click=selectPelicula(pelicula) />
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
  padding: 14px;
  text-align: center;
}

.pelicula-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 20px;
}

</style>

<script>
import { useStore } from '../stores/index';
import { getPeliculas } from '../services/communicationManager.js';

export default {
  data() {
    return {
      peliculas: [],
    }
  },
  mounted() {
    const store = useStore();
    getPeliculas().then((response) => {
      //pelicula : titol, descriocio, cartell, duracio, any, director, id_pelicula
      this.peliculas = response;
      store.setTodasPeliculas(response);
    }).catch((error) => {
      console.log(error);
    });
  },
  methods: {
    selectPelicula(pelicula){
      const store = useStore();
      store.setIdPelicula(pelicula.id_pelicula);
      store.setSelectPelicula(pelicula);
    }
  }  
}
</script>
