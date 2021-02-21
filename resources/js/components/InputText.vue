<template>
    <div class="input-field">
        <textarea
            v-if="area"
            :value="value"
            :erro="erro"
            @input="$emit('input', $event.target.value)"
            class="materialize-textarea validate"
            :class="{invalid: !!erro}"
            :id="id"></textarea>
        <input
            v-else
            :value="value"
            :erro="erro"
            @input="$emit('input', $event.target.value)"
            class="validate"
            :class="{invalid: !!erro}"
            :id="id"
            type="text">
        <label :for="id" :class="{active: !!value}">{{label}}</label>
        <span
            v-if="!!erro"
            class="helper-text"
            :data-error="erro">
        </span>
    </div>
</template>
<script>
export default {
    props: ['value', 'label', 'area', 'erro'],
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
