<template>
    <ul class="input-field">
        <p><label class="active">{{label}}</label></p>
        <li v-if="selectAll">
            <label>
                <input
                    value="selectAll"
                    v-model="checkSelectAll"
                    @change="handleSelectAll($event)"
                    type="checkbox" />
                <span>Marcar todas opções</span>
            </label>
        </li>
        <li v-for="(opt, i) in opts" :key="i">
        <label>
            <input
                :name="id"
                :value="opt.n"
                v-model="checkedOpts"
                @input="$emit('input', checkedOpts)"
                @change="handleCheckOpts($event)"
                type="checkbox" />
            <span>{{opt.d}}</span>
        </label>
        </li>

        <InputFeedback v-if="!!erro" :erro="erro"/>
    </ul>
</template>
<style>
.helper-text.erro {
    color: #F44336;
}
</style>
<script>
import InputFeedback from '@components/InputFeedback.vue'
export default {
    props: [
        'value', 'label', 'area', 'opts', 'erro', 'selectAll'
    ],
    components: {
        InputFeedback
    },
    data () {
        return {
            id: null,
            checkedOpts: [],
            checkSelectAll: []
        }
    },
    mounted () {
        this.id = `inputcheckbox-${this._uid}`
    },
    methods: {
        handleSelectAll(e){
            if(e.target.checked){
                this.checkedOpts = this.opts.map(opt => opt.n)
            } else {
                this.checkedOpts = []
            }
            this.$emit('input', this.checkedOpts)
        },
        handleCheckOpts(e){
            if(!e.target.checked){
                this.checkSelectAll = []
            }
            this.$emit('input', this.checkedOpts)
        }
    }
}
</script>
