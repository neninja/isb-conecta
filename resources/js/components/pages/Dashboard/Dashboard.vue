<template>
  <div>
      <GrupoRecepcao v-if="isRecepcao()"></GrupoRecepcao>
      <GrupoAdministracao v-if="isAdm()"></GrupoAdministracao>
  </div>
</template>
<script>
import GrupoRecepcao from '@/components/pages/Dashboard/Grupos/Recepcao.vue'
import GrupoAdministracao from '@/components/pages/Dashboard/Grupos/Administracao.vue'
import { mapGetters } from 'vuex'

export default {
    components: {
        GrupoRecepcao, GrupoAdministracao
    },
    computed: {
        ...mapGetters('auth', [
            'isLoggedIn',
            'isAdm',
            'isRecepcao',
        ]),
    },
}
</script>
