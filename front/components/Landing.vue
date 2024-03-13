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
.container {
  text-align: center;
  margin: 20px;
}

h1 {
  text-align: center;
  font-size: 2.5rem;
  margin-bottom: 30px;
}

.peliculas-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  grid-gap: 20px;
}

.pelicula-container {
  flex-basis: calc(33.33% - 20px); /* Tres películas por fila con espacio entre ellas */
  margin-bottom: 20px;
}

.pelicula {
  background-color: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
}

.pelicula-cartell {
  max-width: 100%;
  border-radius: 10px;
  margin-bottom: 10px;
}

.pelicula-titol {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.pelicula-director,
.pelicula-any {
  margin-bottom: 5px;
}

.pelicula-descripcion {
  font-style: italic;
}

  </style>
  
  <script>
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
  