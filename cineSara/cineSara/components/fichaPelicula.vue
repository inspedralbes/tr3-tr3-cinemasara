<template>

    <div>
        <div class="container">
            <div class="pelicula-container">

                    <h2 class="pelicula-titol">{{ pelicula.titol }}</h2>
                    <img class="pelicula-cartell" :src="pelicula.cartell" :alt="pelicula.titol">
                    <p class="pelicula-director">Director: {{ pelicula.director }}</p>
                    <p class="pelicula-any">Any: {{ pelicula.any }}</p>
                    <p class="pelicula-descripcion">{{ pelicula.descripcio }}</p>

            </div>
        </div>    
    </div>
</template>

<style scoped>


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
import { useStore } from '../stores/index';
export default {
  props: {
        pelicula: {
            type: Object,
            required: true
        }
    },
 
}

</script>