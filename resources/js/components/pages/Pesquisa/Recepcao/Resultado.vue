<template>
    <div>
        <Descricao
            setor="Recepção"
            titulo="Resultado da Busca"
            obs="Resultados encontrados para sua busca">
        Encontre todos os relatórios postados referentes a sua busca no setor de recepção dentro do Instituto São Benedito.
        </Descricao>

        <ul>
            <li v-for="(atendimento, i) in relatorios.atendimentos ":key="i">
                <CardRelatorio
                    relatorio="Atendimento"
                    :data="atendimento.data"
                    :usuario="atendimento.usuario.name"
                    :pessoaAtendida="atendimento.nomePessoaAtendida"
                    :relato="atendimento.relato"
                    />
            </li>
        </ul>

        <Button @click="handleExibirFormulario()">Voltar ao formulario</Button>
    </div>
</template>

<script>
import Descricao from '@components/Descricao.vue'
import CardRelatorio from '@pageComponents/Pesquisa/CardRelatorio.vue'
import Button from '@components/Button.vue'

export default {
    components: {
        Descricao, CardRelatorio, Button
    },
    props: [
        'relatorios'
    ],
    data(){
        return {
        }
    },
    methods: {
        handleExibirFormulario(){
            this.$emit('voltar')
        }
    }
}
</script>
