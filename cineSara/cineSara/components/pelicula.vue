<template>

    <div>
       <div  >
        <h2 class="pelicula-titol">{{ pelicula.titol }}</h2>
            <img :src="pelicula.cartell" :alt="pelicula.titulo" class="pelicula-cartell"/>
            <p class="pelicula-director">{{ pelicula.director }}</p> 
            <p class="pelicula-any">{{ pelicula.any }}</p>
            <p class="sesiones">{{ pelicula.sesiones }}</p>
            <p class="pelicula-descripcion">{{ pelicula.descripcio }}</p>
       </div>
    </div>
</template>



<script>

export default {
  data() {
    return {
        peliculas: [],
    }
  },
  async fetch() {
    const id = this.$route.params.id; 
    this.peliculas = await obtenerPelicula(id);
}

}
</script>