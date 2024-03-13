<template>
    <div class="container">
      <h1>CINESARA</h1>
      <div class="peliculas-grid">
        <div v-for="pelicula in peliculas" :key="pelicula.id" class="pelicula">
          <img :src="pelicula.cartell" alt="Cartel de la película">
          <h2>{{ pelicula.titol }}</h2>
          <p>Año: {{ pelicula.any }}</p>
          <p>Duración: {{ pelicula.duracio }}</p>
          <p>Director: {{ pelicula.director }}</p>
          <p class="descripcion">{{ pelicula.descripcion }}</p>
        </div>
      </div>
    </div>
  </template>
  
  <style scoped>
.cine-container {
  background-color: #f0f5f9; /* Azul suave */
  color: #2c3e50; /* Texto oscuro */
  padding: 20px;
}

h1 {
  font-size: 36px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 20px;
}

.peliculas-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

.pelicula {
  background-color: #dfe6e9; /* Azul más claro */
  padding: 20px;
  border-radius: 10px;
  transition: background-color 0.3s ease; /* Transición de color al hacer hover */
}

.pelicula:hover {
  background-color: #b2bec3; /* Cambio de color al hacer hover */
}

.pelicula img {
  width: 100%;
  height: auto;
  border-radius: 10px;
  margin-bottom: 10px;
}

h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  margin-bottom: 5px;
}

.descripcion {
  font-style: italic;
  color: #576574; /* Texto más claro */
}
</style>
<script>
export default {
    data(){
        return {
            peliculas: []
        };
    },
    mounted(){
        this.getPeliculas();
    },
    
    methods: {
        async getPeliculas(){
            try{
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