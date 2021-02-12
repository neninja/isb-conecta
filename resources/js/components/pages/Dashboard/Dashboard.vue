<template>
  <div>
      <GrupoRecepcao v-if="isSecretaria()"></GrupoRecepcao/>
  </div>
</template>
<script>
import GrupoRecepcao from '@/components/pages/Dashboard/Grupos/Recepcao.vue'
import { mapGetters } from 'vuex'

export default {
    components: {
        GrupoRecepcao
    },
    computed: {
        ...mapGetters('auth', [
            'isLoggedIn',
            'isAdm',
            'isSecretaria',
        ]),
    },
}
</script>
