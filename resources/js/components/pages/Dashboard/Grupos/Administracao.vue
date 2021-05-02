<template>
  <div>
      <Descricao
          setor="Central de relatórios"
          titulo="Central de Setores"
          obs="Não é você ou não exerce essa função?">
      Você está cadastrado no setor de Recepção, aqui você encontra todas as funções de relatórios disponíveis.
      </Descricao>
      <Lista :itens="relatorios"/>
  </div>
</template>
<script>
import Relatorios from '@pageComponents/Dashboard/ListaLinks/RelatoriosRecepcao.vue'
import Descricao from '@components/Descricao.vue'
import Lista from '@pageComponents/Dashboard/ListaLinks/Lista.vue'
import { mapGetters } from 'vuex'

export default {
    components: {
        Descricao, Lista
    },
    data() {
        return {
            relatorios: [
                {
                    descricao: 'Recepção',
                    nomeRota: 'pesquisaRelatoriosRecepcao'
                },
            ]
        }
    }
}
</script>
