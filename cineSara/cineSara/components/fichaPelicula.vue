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
  height: 78vh;
}

.pelicula-container {
  background-color: #f2f2f2;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 20vw;
  height: 70vh;
}

.pelicula-titol {
  font-size: 24px;
  margin-bottom: 10px;
}

.pelicula-cartell {
  width: 15vw; /* Ancho al 100% del contenedor padre */
  height: auto;
  border-radius: 5px;
  height: 40vh;
}

.container-texto {
  display: flex; /* Utilizamos flexbox para alinear elementos verticalmente */
  flex-direction: column; /* Alinear elementos en columna */
  justify-content: center; /* Centrar verticalmente */
  align-items: center; /* Centrar horizontalmente */
  margin-top: 20px; /* Espacio entre la imagen y el texto */
}

.texto {
  width: 100%; /* Ancho al 100% del contenedor padre */
  text-align: left; /* Alinear texto a la izquierda */
}

.pelicula-director, .pelicula-any, .pelicula-descripcion {
  font-size: 16px;
  margin-bottom: 8px;
  width: 100%; /* Ancho al 100% del contenedor padre */
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
