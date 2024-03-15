User
<template>
    <div class="container">
      <h1>PELICULAS</h1>

        <div v-if="peliculas.length" class="pelicula-container">
          <div v-for="pelicula in peliculas" :key="pelicula.id" class="pelicula">
            <h2 class="pelicula-titol">{{ pelicula.titol }}</h2>
            <img :src="pelicula.cartell" :alt="pelicula.titulo" class="pelicula-cartell"/>
            <p class="pelicula-director">{{ pelicula.director }}</p> 
            <p class="pelicula-any">{{ pelicula.any }}</p>
            <p class="sesiones">{{ pelicula.sesiones }}</p>
            <p class="pelicula-descripcion">{{ pelicula.descripcio }}</p>
            <div v-for="sesion in sesiones " :key="sesion.id" >
                <p v-for="sesion in sesiones" :key="sesion.id" v-if="sesion.id_pelicula === pelicula.id_pelicula">{{ sesones.find( sesion => sesion.id_peliculas == peliculas.id_pelicula).dia }}</p>
                <p v-for="sesion in sesiones" :key="sesion.id" v-if="sesion.id_pelicula === pelicula.id_pelicula">{{ sesones.find( sesion => sesion.id_peliculas == peliculas.id_pelicula).hora }}</p>

            </div>
            </div>
            
        </div>
    </div>
  </template>
    

    <script>
  
    export default {
      data() {
        return {
            peliculas: [],
            sesiones: [] 
        }
      },
      mounted() {
        this.getPeliculas();
        this.getSesiones();
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
        },
        async getSesiones() {
        try {
            const res = await fetch('http://localhost:8000/api/sesiones');
            if (!res.ok) {
                throw new Error('Error al obtener las sesiones');
            }
            const data = await res.json();  
            this.sesiones = data;
        } catch (error) {
            console.error(error);

        }
    }
    }

   
    }
    </script>