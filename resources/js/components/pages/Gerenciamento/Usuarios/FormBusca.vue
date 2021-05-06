<template>
    <div>
        <form>
            <InputText v-model="nome" label="Nome"/>
            <InputSelect
                v-model="setor"
                :erro="erros.setor"
                :options="[
                           {value: 1, desc: 'Administração'},
                           {value: 2, desc: 'Recepção'}
                ]"
                :allowEmpty="true"
                label="Setor"
            />
            <Button @click="pesquisa">
                <i class="material-icons">search</i>
            </Button>
        </form>
    </div>
</template>
<script>
import Descricao from '@components/Descricao.vue'
import InputText from '@components/InputText.vue'
import InputSelect from '@components/InputSelect.vue'
import Button from '@components/Button.vue'

export default {
    components: {
        Descricao, InputText, InputSelect, Button
    },
    data(){
        return {
            nome: "",
            setor: "",
            erros: {
                nome: "",
                setor: ""
            },
            usuarios: [
                {
                    id: 1,
                    nome: 'Felipe',
                },
                {
                    id: 2,
                    nome: 'Ana',
                }
            ]
        }
    },
    methods: {
        pesquisa(){
            this.$emit('pesquisa', {
                nome: this.nome,
                setor: this.setor
            })
        }
    }
}
</script>
