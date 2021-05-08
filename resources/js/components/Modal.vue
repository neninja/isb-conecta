<template>
    <div>
        <div class="modal" :class="className">
            <div class="modal-content">
                <h4>{{header}}</h4>
                <slot></slot>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat" @click="$emit('ok')" >Ok</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat" @click="$emit('cancelar')" >Cancelar</a>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    props: ['header', 'type', 'isOpen'],
    data () {
        return {
            id: null,
            instance: null,
        }
    },
    beforeMount: function(){
        this.className = `modal-${this._uid}`
    },
    mounted: function(){
        var elems = document.querySelectorAll(`.${this.className}`);
        this.instance = M.Modal.init(elems, null)[0];
    },
    watch: {
        isOpen: function(newVal, oldVal) { // watch it
            if(newVal){
                this.instance.open()
            }
        }
    }
}
</script>
