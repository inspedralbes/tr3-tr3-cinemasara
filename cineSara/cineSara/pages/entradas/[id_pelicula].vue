<template>
    <div>
        <h1>Sesion</h1>
        <ficha-pelicula :pelicula="{}"/>

        <h1>Pati Butacas</h1>
    </div>
</template>

<script>

    export default {
        props: {
        pelicula: {
            type: Object,
            required: true
        }
    },
    };

</script>