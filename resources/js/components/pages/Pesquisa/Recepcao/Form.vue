<template>
    <div>
        <Descricao
            setor="Recepção"
            titulo="Filtro de Buscas"
            obs="Todos os campos são obrigatórios">
        Selecione a data desejada e os diferentes relatórios publicados pelo setor de recepção que deseja visualizar.
        </Descricao>

        <InputDate v-model="data" :initialDate="initialDate" label="Data inicial"/>

        <InputCheckbox
            ref="checkboxes"
            v-model="relatorios"
            selectAll=true
            label="Relatorios"
            :erro="erros.relatorios"
            :opts="[
                    {n: 'atendimento', d: 'Atendimentos'},
                    ]"/>

        <Button @click="handleListar()">Listar</Button>
    </div>
</template>

<script>
import Descricao from '@components/Descricao.vue'
import InputDate from '@components/InputDate.vue'
import InputCheckbox from '@components/InputCheckbox.vue'
import Button from '@components/Button.vue'

export default {
    components: {
        Descricao, InputDate, InputCheckbox, Button
    },
    data(){
        return {
            initialDate: new Date(),
            data: '',
            relatorios: [],
            erros: {
                relatorios: null,
            }
        }
    },
    methods: {
        handleListar(){
            let filtros = {
                data: this.data,
                relatorios: this.relatorios
            }
            this.$emit('submit', filtros)
        }
    }
}
</script>
