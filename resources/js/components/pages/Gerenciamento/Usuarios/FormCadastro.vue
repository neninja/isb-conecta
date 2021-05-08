<template>
    <div>
        <form>
            <input type="hidden" v-model="id">
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
    props: [
        'id', 'initNome', 'initSetor', 'initEmail'
    ],
    data(){
        return {
            nome: this.initNome,
            setor: this.initSetor,
            email: this.initEmail,
            senha: '',
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
                id: this.id,
                nome: this.nome,
                senha: this.senha,
                email: this.email,
                setor: this.setor
            })
        }
    }
}
</script>
