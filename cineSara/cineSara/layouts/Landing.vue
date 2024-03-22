<template>
  <div class="container">
    <h1>PELÍCULAS</h1>
    <div v-if="peliculas.length" class="pelicula-container">
      <div v-for="pelicula in peliculas" :key="pelicula.id_pelicula" class="pelicula" >
        <nuxt-link :to="{ name: 'entradas-id_pelicula', params: { id_pelicula: pelicula.id_pelicula}}" class="nav-link" @click=selectPelicula(pelicula)>
          <fichaPelicula :pelicula="pelicula" :sesion="obtenerSesion(pelicula.id_pelicula)"/>
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
    }).catch((error) => {
      console.log(error);
    });

  },
  methods: {
    selectPelicula(pelicula){
      
      const store = useStore();
      store.setPeliculaId(pelicula);
      this.$router.push({ name: 'entradas-id_pelicula', params: { id_pelicula: pelicula.id_pelicula } });
    },

    async obtenerSesion(idPelicula){
      try {
        const response = await fetch(`http://localhost:8000/api/sesiones/${idPelicula}`);
        if(!response.ok){
          throw new Error('Error al obtener las sesiones');
        }
        const data = await response.json();
        return data;
      } catch (error) {
        console.log(error);
        return null;
      }
    }
  }
  
}
</script>
