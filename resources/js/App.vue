<template>
    <div>
        <NavBar v-if="logado"/>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<style>
.container {
    margin-bottom: 3rem;
}
</style>
<script>
import NavBar from '@/components/Navbar.vue'

export default {
    components: {
        NavBar
    },
    data(){
        return {
            logado: true
        }
    }
}
</script>
