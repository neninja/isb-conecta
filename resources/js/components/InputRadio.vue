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

        <span
            v-if="!!erro"
            class="helper-text"
            >
            {{erro}}
        </span>
    </div>
</template>
<script>
export default {
    props: ['value', 'label', 'area', 'opts', 'erro'],
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
