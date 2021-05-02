<template>
    <div>
        <h2>{{setor}}</h2>
        <h1>{{titulo}}</h1>
        <p><slot></slot></p>
        <p class="obs">{{obs}}</p>
    </div>
</template>
<style scoped>
h2 {
    color: #C4C4C4;
    margin-bottom: 0;
    font-weight: bold;
    font-size: 1.5rem;
}

h1 {
    color: #005D73;
    margin-top: 0;
    font-weight: bold;
    font-size: 2.5rem;
}

.obs {
    color: #C4C4C4;
    font-weight: bold;
    text-transform: uppercase;
}
</style>
<script>
export default {
    props: ['setor', 'titulo', 'obs']
}
</script>
