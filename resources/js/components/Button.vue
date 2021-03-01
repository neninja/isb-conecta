<template>
    <router-link
        v-if="link"
        :to="link"
        class="waves-effect waves-light btn">
        <slot></slot>
    </router-link>
    <button
        v-else
        type="button"
        @click="$emit('click')"
        :class="color"
        class="waves-effect waves-light btn">
        <slot></slot>
    </button>
</template>
<style scoped>
.white, .grey {
    color: #000;
}
</style>
<script>
export default {
    props: ['link', 'color'],
}
</script>
