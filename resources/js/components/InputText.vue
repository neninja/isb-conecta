<template>
    <div class="input-field">
        <textarea
            v-if="area"
            :value="value"
            @input="$emit('input', $event.target.value)"
            class="materialize-textarea"
            :id="id"></textarea>
        <input
            v-else
            v-bind:value="value"
            v-on:input="$emit('input', $event.target.value)"
            :id="id"
            type="text">
        <label :for="id" :class="{active: !!value}">{{label}}</label>
    </div>
</template>
<script>
export default {
    props: ['value', 'label', 'area'],
    data () {
        return {
            id: null
        }
    },
    mounted () {
        this.id = `inputtext-${this._uid}`
    }
}
</script>
