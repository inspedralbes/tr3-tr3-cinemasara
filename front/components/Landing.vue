<template>
  <div class="container">
    <h1>PELICULAS</h1>
    <div class="peliculas-grid">
      <div v-if="peliculas.length" class="pelicula-container">
        <div v-for="pelicula in peliculas" :key="pelicula.id" class="pelicula">
          <img :src="pelicula.cartell" :alt="pelicula.titulo" class="pelicula-cartell"/>
          <h2 class="pelicula-titol">{{ pelicula.titol }}</h2>
          <p class="pelicula-director">{{ pelicula.director }}</p> 
          <p class="pelicula-any">{{ pelicula.any }}</p>
          <p class="pelicula-descripcion">{{ pelicula.descripcio }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
  
<style scoped>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  text-align: center;
  margin-bottom: 30px;
}

.peliculas-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.pelicula {
  width: 100%;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  overflow: hidden;
}

.pelicula-cartell {
  width: 100%;
  height: auto;
  border-radius: 8px 8px 0 0;
}

.pelicula-info {
  padding: 15px;
}

.pelicula-titulo {
  margin-top: 0;
  margin-bottom: 10px;
  font-size: 20px;
  font-weight: bold;
}

.pelicula-director,
.pelicula-any {
  margin: 0;
  margin-bottom: 5px;
  font-size: 16px;
}

.pelicula-descripcion {
  margin: 0;
  font-size: 16px;
  color: #555;
}
</style>


  
  <script>
  import {defineStore} from 'pinia';

  export default {
    data() {
      return {
        peliculas: [] 
      }
    },
    mounted() {
      this.getPeliculas();
    },
    methods: {
      async getPeliculas() {
        try {
          const res = await fetch('http://localhost:8000/api/peliculas');
          if (!res.ok) {
            throw new Error('Error al obtener las peliculas');                    
          }
          const data = await res.json();
          this.peliculas = data;
        } catch (error) {
          console.error(error);
        }
      }
    }
  }
  </script>
  