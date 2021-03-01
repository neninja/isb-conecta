<template>
    <div class="input-field">
        <p><label class="active">{{label}}</label></p>
        <ul>
            <li v-for="(opt, i) in opts" :key="i">
                <Button @click="toggle(i)" :color="iActive !== i ? 'grey lighten-5':''">
                    {{opt.d}}
                </Button>

                <input
                    :name="id"
                    :value="opt.n"
                    :checked="iActive === i"
                    type="radio" />
            </li>

        </ul>
        <InputFeedback v-if="!!erro" :erro="erro"/>
    </div>
</template>
<style scoped>
ul {
    display: flex;
}

li:not(:first-child) {
    margin-left: 1rem;
}
</style>
<script>
import Button from '@/components/Button.vue'
import InputFeedback from '@/components/InputFeedback.vue'

export default {
    props: ['value', 'label', 'area', 'opts', 'erro'],
    components: {
        Button, InputFeedback
    },
    data () {
        return {
            id: null,
            iActive: null
        }
    },
    methods: {
        toggle(i){
            this.iActive = i
            this.$emit('input', this.opts[i].n)
        }
    },
    mounted () {
        this.id = `inputradio-${this._uid}`
    }
}
</script>
