<template>
    <div class="input-field">
        <i class="material-icons prefix">today</i>
        <input
            :value="value"
            @change="$emit('input', $event.target.value)"
            type="text"
            class="datepicker"
            :id="id">
        <label :for="id" :class="{active: !!value}">{{label}}</label>
    </div>
</template>
<script>
export default {
    props: ['value', 'label', 'initialDate'],
    data () {
        return {
            id: null,
            dateInstance: null,
        }
    },
    beforeMount: function(){
        this.id = `inputdate-${this._uid}`
    },
    mounted: function(){
        var elem = document.getElementById(`${this.id}`);

        let opt = {
            format: 'dd/mm/yyyy',
            i18n: {
                cancel: 'Cancelar',
                clear: 'Limpar',
                months: [
                    'Janeiro',
                    'Fevereiro',
                    'Março',
                    'Abril',
                    'Maio',
                    'Junho',
                    'Julho',
                    'Agosto',
                    'Setembro',
                    'Outubro',
                    'Novembro',
                    'Dezembro'
                ],
                monthsShort: [
                    'Jan',
                    'Fev',
                    'Mar',
                    'Abr',
                    'Mai',
                    'Jun',
                    'Jul',
                    'Ago',
                    'Set',
                    'Out',
                    'Nov',
                    'Dez'
                ],
                weekdays: [
                    'Domingo',
                    'Segunda',
                    'Terça',
                    'Quarta',
                    'Quinta',
                    'Sexta',
                    'Sábado'
                ],
                weekdaysShort: [
                    'Dom',
                    'Seg',
                    'Ter',
                    'Qua',
                    'Qui',
                    'Sex',
                    'Sáb'
                ],
                weekdaysAbbrev: ['D','S','T','Q','Q','S','S']
            }
        }

        if(!!this.initialDate){
            opt.defaultDate = this.initialDate
            opt.setDefaultDate = true
        }

        this.dateInstance = M.Datepicker.init(elem, opt);
    }
}
</script>
