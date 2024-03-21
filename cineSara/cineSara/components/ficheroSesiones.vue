<template>
    <div v-if="sesione" >
        <p>{{ sesione.hora }}</p>
    </div>
</template>


<script>
    import { useStore } from "../stores/index";

    export default {
        props: {
            sesione: {
                type: Object,
                required: true
            },
            pelicula: {
                type: Object,
                required: true
            }
        },
    }

</script>