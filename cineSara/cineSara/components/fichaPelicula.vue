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
import { useStore } from '../stores/index';
export default {
  props: {
        pelicula: {
            type: Object,
            required: true
        },
        sesion: {
            type: Array,
            required: true
        }
    },
    mounted() {
        this.getSesion();
    },
    
    methods: {
       async getSesion(){
            try{
                const response = await fetch(`http://localhost:8000/api/sesiones/${this.$route.params.id_pelicula}`)
                
                if(!response.ok){
                    throw new Error(data.message);
                }                
                const data = await response.json();
                this.sesion = data;
            }catch(error){
              console.error("Error al obtener la sesión:", error);
            }    
        }
    },
 
 
}

</script>