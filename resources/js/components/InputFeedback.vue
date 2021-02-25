<template>
    <span class="helper-text erro" >{{erro}}</span>
</template>
<style>
.helper-text.erro {
    color: #F44336;
}
</style>
<script>
export default {
    props: ['erro']
}
</script>
