<template>
    <div>
        <h1 class="title">
            Bem-vindo ao <span class="appname">ISB Conecta</span>
        </h1>

        <form>
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name2" type="text" class="validate">
                    <label for="first_name2">First Name</label>
                </div>
            </div>
        </form>

        <Button :link="{ name: 'loginUsername' }">
            Prosseguir para login
        </Button>
    </div>
</template>
<style scoped>
.appname {
    text-transform: uppercase;
}
</style>
<script>
import Button from './Button.vue'
export default {
    components: {
        Button
    }
}
</script>
