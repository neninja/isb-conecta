<template>
    <ul class="collection">
        <li v-for="(item, i) in itens" class="collection-item" :key="i">
            <i class="material-icons left">add_circle_outline</i>
            <router-link :to="{ name: item.nomeRota }">
                {{ item.descricao }}
            </router-link>
        </li>
    </ul>
</template>
<style scoped>
li, a {
    text-transform: uppercase;
    color: #005D73;
    font-weight: bold;
}
</style>
<script>
export default {
    props: ['itens']
}
</script>
