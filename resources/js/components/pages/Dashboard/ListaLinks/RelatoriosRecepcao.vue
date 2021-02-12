<template>
    <Lista :itens="relatorios"/>
</template>
<script>
import Lista from '@/components/pages/Dashboard/ListaLinks/Lista.vue'
export default {
    components: {
        Lista
    },
    data() {
        return {
            relatorios: [
                {
                    descricao: 'Atendimento',
                    nomeRota: 'relatorioAtendimentoRecepcao'
                },
                {
                    descricao: 'Telefonema',
                    nomeRota: 'relatorioTelefonemaRecepcao'
                },
                {
                    descricao: 'Solicitação',
                    nomeRota: 'relatorioSolicitacaoRecepcao'
                },
                {
                    descricao: 'Observações',
                    nomeRota: 'relatorioObservacaoRecepcao'
                },
                {
                    descricao: 'Ocorrência',
                    nomeRota: 'relatorioOcorrencia'
                },
            ]
        }
    },
}
</script>
