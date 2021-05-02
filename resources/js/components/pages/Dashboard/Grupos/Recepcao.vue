<template>
  <div>
      <Descricao
          setor="Setor de Recepção"
          titulo="Central de Setores"
          obs="Não é você ou não exerce essa função?">
      Você está cadastrado no setor de Recepção, aqui você encontra todas as funções de relatórios disponíveis.
      </Descricao>
      <Relatorios></Relatorios/>
  </div>
</template>
<script>
import Relatorios from '@/components/pages/Dashboard/ListaLinks/RelatoriosRecepcao.vue'
import Descricao from '@/components/Descricao.vue'
import { mapGetters } from 'vuex'

export default {
    components: {
        Relatorios, Descricao
    },
}
</script>
