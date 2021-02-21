<template>
    <div class="input-field">
        <input
            v-bind:value="value"
            v-on:input="$emit('input', $event.target.value)"
            :id="id"
            type="password">
        <label :for="id" :class="{active: !!value}">{{label}}</label>
    </div>
</template>
<script>
export default {
    props: ['value', 'label'],
    data () {
        return {
            id: null
        }
    },
    mounted () {
        this.id = `inputpwd-${this._uid}`
    }
}
</script>
