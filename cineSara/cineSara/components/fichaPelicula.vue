<template>
  <div>
      <div class="container">
          <div class="pelicula-container">
                  <h2 class="pelicula-titol">{{ pelicula.titol }}</h2>
                  <img class="pelicula-cartell" :src="pelicula.cartell" :alt="pelicula.titol">
                  <p class="pelicula-director">Director: {{ pelicula.director }}</p>
                  <p class="pelicula-any">Any: {{ pelicula.any }}</p>
                  <p class="pelicula-descripcion">{{ pelicula.descripcio }}</p>
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
height: 100vh;
}

.pelicula-container {
background-color: #f2f2f2;
border-radius: 10px;
padding: 20px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
text-align: center;
}

.pelicula-titol {
font-size: 24px;
margin-bottom: 10px;
}

.pelicula-cartell {
width: 200px;
height: auto;
margin-bottom: 20px;
border-radius: 5px;
}

.pelicula-director, .pelicula-any {
font-size: 16px;
margin-bottom: 8px;
}

.pelicula-descripcion {
font-size: 18px;
line-height: 1.5;
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