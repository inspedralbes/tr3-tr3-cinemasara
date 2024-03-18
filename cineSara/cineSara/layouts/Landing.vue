<template>
    <div class="container">
      <h1>PELICULAS</h1>
        <div v-if="peliculas.length" class="pelicula-container">
          <div v-for="pelicula in peliculas" :key="pelicula.id" class="pelicula">
                <router-link :to="`/pelicula/${pelicula.id}`" class="nav-link">
                <h2 class="pelicula-titol">{{ pelicula.titol }}</h2>
                <img :src="pelicula.cartell" :alt="pelicula.titulo" class="pelicula-cartell"/>
              </router-link>
            </div>   
        </div>
    </div>
  </template>

  <style>
  .container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  text-align: center;
}

.pelicula-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

.pelicula {
  background-color: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.pelicula-titol {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.pelicula-cartell {
  width: 100%;
  border-radius: 10px;
  margin-bottom: 10px;
}

.pelicula-director,
.pelicula-any,
.sesiones {
  margin-bottom: 5px;
  font-size: 0.9rem;
}

.pelicula-descripcion {
  font-size: 1rem;
}

  </style>
    
    <script>
  
    export default {
      data() {
        return {
            peliculas: [],
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