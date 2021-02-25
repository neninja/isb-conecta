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

        <InputFeedback v-if="!!erro" :erro="erro"/>
    </div>
</template>
<script>
import InputFeedback from '@/components/InputFeedback.vue'
export default {
    props: ['value', 'label', 'area', 'erro'],
    components: {
        InputFeedback
    },
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
