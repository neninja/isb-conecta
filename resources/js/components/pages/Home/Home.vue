<template>
  <div>
      <ul>
          <li>
              <router-link :to="{ name: 'login' }">Login</router-link>
          </li>
          <li>
              <router-link v-if="$env_ghpages_test" :to="{ name: 'frontendconfigs' }">Frontend Configs</router-link>
          </li>
      </ul>
  </div>
</template>
<script>
</script>
