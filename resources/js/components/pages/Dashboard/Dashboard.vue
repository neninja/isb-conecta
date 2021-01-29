<template>
  <div>
      dashboard

      <Button v-on:click="logout()">
          Logout
      </Button>
  </div>
</template>
<script>
import Button from '@/components/Button.vue'
import { toastPermanente } from '@/toast.js'

export default {
    components: {
        Button
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
