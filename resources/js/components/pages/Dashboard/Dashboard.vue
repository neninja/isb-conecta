<template>
  <div>
      dashboard
      <ListaSetores v-if="isAdm"/>
  </div>
</template>
<script>
import ListaSetores from '@/components/pages/Dashboard/Setores.vue'
import { mapGetters } from 'vuex'

export default {
    components: {
        ListaSetores
    },
    computed: {
        ...mapGetters('auth', [
            'isLoggedIn',
            'setor'
        ]),
        isAdm(){
            let i = this.setor().findIndex(s => s.id === 1)
            return i >= 0
        }
    },
}
</script>
