<template>
    <div v-if="sesion" >
        <p>{{ sesion.hora }}</p>
        <button @click="sesion">a</button>
    </div>
</template>


<script>

    export default {
        props: {
            sesion: {
                type: Object,
                required: true,
            },
            pelicula: {
                type: Object,
                required: true
            }
        },

    }

</script>