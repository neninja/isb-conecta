<template>
    <div class="input-field">
        <p><label class="active">{{label}}</label></p>
        <p v-for="(opt, i) in opts":key="i">
        <label>
            <input
                :name="id"
                :value="opt.n"
                @input="$emit('input', $event.target.value)"
                type="radio" />
            <span>{{opt.d}}</span>
        </label>
        </p>

        <InputFeedback v-if="!!erro" :erro="erro"/>
    </div>
</template>
<style>
.helper-text.erro {
    color: #F44336;
}
</style>
<script>
import InputFeedback from '@/components/InputFeedback.vue'
export default {
    props: ['value', 'label', 'area', 'opts', 'erro'],
    components: {
        InputFeedback
    },
    data () {
        return {
            id: null
        }
    },
    mounted () {
        this.id = `inputradio-${this._uid}`
    }
}
</script>
