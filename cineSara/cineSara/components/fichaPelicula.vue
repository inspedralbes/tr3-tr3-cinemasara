<template>
  <div>
    <div class="container">
      <div class="pelicula-container">
        <h2 class="pelicula-titol">{{ pelicula.titol }}</h2>
        <div class="container-texto">
          <img class="pelicula-cartell" :src="pelicula.cartell" :alt="pelicula.titol">
          <div class="texto">
            <p class="pelicula-director">Director: {{ pelicula.director }}</p>
            <p class="pelicula-any">Any: {{ pelicula.any }}</p>
            <p class="pelicula-descripcion">{{ pelicula.descripcio }}</p>
          </div>
        </div>
        <ficheroSesiones :id_pelicula="pelicula.id_pelicula" class="ficha-sesion" />
      </div>
    </div>    
  </div>
</template>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: auto;
  padding: 20px;
}

.pelicula-container {
  background-color: #f2f2f2;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 50vh;
  max-width: 400px;
}

.pelicula-titol {
  font-size: 24px;
  margin-bottom: 10px;
}

.pelicula-cartell {
  width: 100%;
  height: auto;
  border-radius: 5px;
  max-height: 50vh;
}

.container-texto {
  margin-top: 20px;
}

.texto {
  text-align: left;
}

.pelicula-director, .pelicula-any, .pelicula-descripcion {
  font-size: 16px;
  margin-bottom: 8px;
}

@media only screen and (max-width: 600px) {
  .pelicula-container {
    width: 100%;
    max-width: 100%; 
  }

  .pelicula-cartell {
    max-height: 30vh;
    max-width: 100%; 
  }
}

</style>

<script>
export default {
  props: {
      pelicula: {
          type: Object,
          required: true
      }
  }
}
</script>
