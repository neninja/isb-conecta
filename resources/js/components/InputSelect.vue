<template>
    <div class="input-field">
        <select :value="value" @change="$emit('input', $event.target.value)">
            <option value="" :disabled="!allowEmpty" selected></option>
            <option v-for="(opt, i) in options" :key="i" :value="opt.value">{{opt.desc}}</option>
        </select>
        <label>{{label}}</label>

        <InputFeedback v-if="!!erro" :erro="erro"/>
    </div>
</template>
<script>
import InputFeedback from '@components/InputFeedback.vue'
export default {
    props: ['value', 'options', 'label', 'erro', 'allowEmpty'],
    components: {
        InputFeedback
    },
    data () {
        return {
            id: null,
            instance: null
        }
    },
    beforeMount () {
        this.id = `inputselect-${this._uid}`
    },
    mounted () {
        var elem = document.querySelectorAll('select');
        this.instance = M.FormSelect.init(elem, {});
    }
}
</script>
