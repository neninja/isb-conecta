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
        class="waves-effect waves-light btn">
        <slot></slot>
    </button>
</template>
<script>
export default {
    props: ['link'],
}
</script>
