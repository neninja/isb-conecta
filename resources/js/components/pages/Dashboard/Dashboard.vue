<template>
  <div>
      dashboard

      <ListaSetores v-if="setor === 1">
          esta me vendo
      </ListaSetores>
      <div v-else>
          ou aqui
      </div>

      <Button v-on:click="logout()">
          Logout
      </Button>
  </div>
</template>
<script>
import Button from '@/components/Button.vue'
import ListaSetores from '@/components/pages/Dashboard/Setores.vue'
import { toastPermanente } from '@/toast.js'

export default {
    components: {
        Button, ListaSetores
    },
    data(){
        return {
            setor: 1
        }
    },
    methods: {
        logout() {
            axios.get('/api/logout')
                .then(response => {
                    this.$router.push({name: 'home'});
                }).catch(error => {
                    toastPermanente({
                        html: error,
                        classes: 'red',
                        displayLength: Infinity
                    })
                });
        },
    }
}
</script>
