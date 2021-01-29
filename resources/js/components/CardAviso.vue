<template>
    <div
        class="card-panel lighten-2"
        :class="[
                 {red: tipo === 'danger'},
                 {yellow: tipo === 'warning'},
                 {green: tipo === 'success'}
        ]">
      <slot></slot>{{tipo}}
  </div>
</template>
<script>
export default {
    props: ['tipo'],
}
</script>
