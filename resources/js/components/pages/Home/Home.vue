<template>
  <div>
      <router-link :to="{ name: 'login' }">Login</router-link>
      <router-link v-if="$env_ghpages_test" :to="{ name: 'frontendconfigs' }">Frontend Configs</router-link>
  </div>
</template>
<script>
</script>
