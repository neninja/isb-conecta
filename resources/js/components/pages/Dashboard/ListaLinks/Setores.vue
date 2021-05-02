<template>
    <Lista :itens="setores"/>
</template>
<script>
import Lista from '@/components/pages/Dashboard/ListaLinks/Lista.vue'
export default {
    components: {
        Lista
    },
    data() {
        return {
            setores: [
                {
                    descricao: 'Recepção',
                    nomeRota: 'verRelatoriosRecepcao'
                },
//                {
//                    descricao: 'Telefonema',
//                    nomeRota: 'relatorioTelefonemaRecepcao'
//                },
//                {
//                    descricao: 'Solicitação',
//                    nomeRota: 'relatorioSolicitacaoRecepcao'
//                },
//                {
//                    descricao: 'Observações',
//                    nomeRota: 'relatorioObservacaoRecepcao'
//                },
//                {
//                    descricao: 'Ocorrência',
//                    nomeRota: 'relatorioOcorrencia'
//                },
            ]
        }
    },
}
</script>
