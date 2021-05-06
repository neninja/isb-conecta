<template>
    <div>
        <form>
            <InputText v-model="nome" label="Nome" :erro="erros.nome"/>
            <InputText v-model="email" label="Email" :erro="erros.email"/>
            <InputPassword v-model="senha" label="Senha" :erro="erros.senha"/>
            <InputSelect
                v-model="setor"
                :erro="erros.setor"
                :options="[
                           {value: 1, desc: 'Administração'},
                           {value: 2, desc: 'Recepção'}
                ]"
                label="Setor"
            />
       <div class="row">
            <Button @click="submit" color="green">
                Criar
            </Button>

            <Button @click="$emit('cancel')" color="red">
                cancelar
            </Button>
        </div>
        </form>
    </div>
</template>
<script>
import Descricao from '@components/Descricao.vue'
import InputText from '@components/InputText.vue'
import InputPassword from '@components/InputPassword.vue'
import InputSelect from '@components/InputSelect.vue'
import Button from '@components/Button.vue'

export default {
    components: {
        Descricao, InputText, InputSelect, Button, InputPassword
    },
    data(){
        return {
            nome: "",
            senha: "",
            setor: "",
            email: "",
            erros: {
                nome: "",
                senha: "",
                email: "",
                setor: ""
            }
        }
    },
    methods: {
        submit(){
            this.$emit('submit', {
                nome: this.nome,
                senha: this.senha,
                email: this.email,
                setor: this.setor
            })
        }
    }
}
</script>
