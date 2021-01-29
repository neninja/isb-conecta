<template>
    <div>
        <form>
            <div class="row">
                <div class="input-field col s6 active">
                    <input value="Alvin" id="first_name2" type="text" class="validate">
                    <label class="active" for="first_name2">First Name</label>
                </div>
            </div>

            <Button :link="{ name: 'loginWelcome' }">
                Voltar
            </Button>
            <Button :link="{ name: 'loginPassword' }">
                Prosseguir
            </Button>
        </form>
    </div>
</template>
<script>
import Button from './Button.vue'
export default {
    components: {
        Button
    }
}
</script>
