<template>
    <div>
        <transition name="fade">
        <div v-show="exibirFormulario">
            <Form @submit="handleListar"/>
        </div>
        </transition>
        <transition name="fade">
        <div v-if="!exibirFormulario">
            <Resultado :relatorios="relatorios" @voltar="handleVoltar"/>
        </div>
        </transition>
    </div>
</template>

<script>
import Form from './Form.vue'
import Resultado from './Resultado.vue'
import { filtraRelatoriosRecepcao } from '@api-backend/relatorios'

export default {
    components: {
        Form, Resultado
    },
    data(){
        return {
            exibirFormulario: true,
            relatorios: {
                atendimentos: []
            }
        }
    },
    methods: {
        handleListar(filtros){
            filtraRelatoriosRecepcao(filtros.data, filtros.relatorios)
                .then((resp) => {
                    console.log(resp)
                    this.relatorios = resp
                    this.exibirFormulario = false
                })
                .catch(err => {
                    console.log(err.message)
                })
        },
        handleVoltar(){
            this.exibirFormulario = true
        }
    }
}
</script>
