<template>
    <div class="admin">
        <h1 class="admin-heading">Administración de Películas</h1>

        <!-- Formulario para crear una nueva película -->
        <div class="crear-pelicula">
            <h2 class="form-heading">Crear Nueva Película</h2>
            <form @submit.prevent="crearPelicula" class="form">
                <div class="form-group">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" id="titulo" v-model="peliculaNueva.titol" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="director" class="form-label">Director:</label>
                    <input type="text" id="director" v-model="peliculaNueva.director" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="duracion" class="form-label">Duración (minutos):</label>
                    <input type="number" id="duracion" v-model="peliculaNueva.duracio" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="portada" class="form-label">URL de la imagen:</label>
                    <input type="text" id="portada" v-model="peliculaNueva.cartell" required class="form-input">
                </div>
                <div class="form-buttons">
                    <label for="any" class="form-label">Any:</label>
                    <input type="number" id="any" v-model="peliculaNueva.any" required class="form-input">
                </div>
                <button type="submit" class="form-button primary-button">Crear Película</button>
            </form>
        </div>

        <!-- Listado de películas existentes -->
        <div class="listado-peliculas">
            <h2 class="list-heading">Listado de Películas</h2>
            <ul class="list">
                <li v-for="pelicula in peliculas" :key="pelicula.id_pelicula" class="list-item">
                    <img :src="pelicula.cartell" alt="Portada de la película" class="pelicula-portada">
                    <span class="pelicula-titulo">{{ pelicula.titol }}</span>
                    <div class="list-buttons">
                        <button @click="editarPelicula(pelicula)" class="list-button edit-button">Editar</button>
                        <button @click="borrarPelicula(pelicula)" class="list-button delete-button">Eliminar</button>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Formulario para editar una película -->
        <div v-if="peliculaEditando" class="editar-pelicula">
            <h2 class="form-heading">Editar Película</h2>
            <form @submit.prevent="actualizarPelicula" class="form">
                <div class="form-group">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" id="titulo" v-model="peliculaEditar.titulo" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="director" class="form-label">Director:</label>
                    <input type="text" id="director" v-model="peliculaEditar.director" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="duracion" class="form-label">Duración (minutos):</label>
                    <input type="number" id="duracion" v-model="peliculaEditar.duracion" required class="form-input">
                </div>

                <div class="form-buttons">
                    <button type="submit" class="form-button primary-button">Actualizar Película</button>
                    <button @click="cancelarEdicion" class="form-button secondary-button">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
import { getPeliculas, crearPelicula,  borrarPelicula, actualizarPelicula } from '../services/communicationManager'

    export default{
        data(){
            return{
                peliculas: [],
                pelicula: {
                    peliculaNueva: {
                        titol: '',
                        director: '',
                        any: '',
                        duracio: null,
                        cartell: '',
                    },
                    peliculaEditar: null,
                }
            }

        },
        async mounted(){
            await this.getPeliculas();
        },
        methods: {
            async getPeliculas(){
                this.peliculas = await getPeliculas();
            },
            async crearPelicula(){
               try{
                   await crearPelicula(this.pelicula.peliculaNueva);
                   this.pelicula.peliculaNueva = {
                       titol: '',
                       director: '',
                       any: '',
                       duracio: null,
                   }
                   await this.getPeliculas();
               } catch(error){
                   console.log('Error al crear la película', error);
               }
            },
            async borrarPelicula(pelicula){
                try{
                    await borrarPelicula(pelicula.id);
                    await this.getPeliculas();
                } catch(error){
                    console.log('Error al eliminar la película', error);
                }
            },
            async actualizarPelicula(){
                try{
                    await actualizarPelicula(this.pelicula.peliculaEditando);
                    this.pelicula.peliculaEditar = null;
                    await this.getPeliculas();
                } catch(error){
                    console.log('Error al editar la película', error);
                }
            }
        }

    }

</script>