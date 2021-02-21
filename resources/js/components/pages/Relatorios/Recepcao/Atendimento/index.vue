<template>
    <div>
      <Descricao
          setor="Setor de Recepção"
          obs="Todos os campos são obrigatórios">
      Adicione as informações referentes ao atendimento realizado dentro do Instituto São Benedito.
      </Descricao>
      <InputDate v-model="data" :initialDate="initialDate" label="Data do atendimento"/>
      <InputRadio
          v-model="onde"
          label="Onde foi realizado o atendimento"
          :erro="erros.onde"
          :opts="[
                  {n: 'porta', d: 'Porta'},
                  {n: 'telefone', d: 'Telefone'},
                 ]"/>
      <InputText
          v-model="usuario"
          label="Usuário atendido"
          :erro="erros.usuario"/>
      <InputText
          v-model="contato"
          label="Contato do usuário"
          :erro="erros.contato"/>
      <InputText
          v-model="relato"
          label="Relato do atendimento"
          :area="true"
          :erro="erros.relato"/>
      <Button @click="enviaFormulario()">Adicionar</Button>
    </div>
</template>
<script>
import Descricao from '@/components/Descricao.vue'
import InputText from '@/components/InputText.vue'
import InputRadio from '@/components/InputRadio.vue'
import InputDate from '@/components/InputDate.vue'
import Button from '@/components/Button.vue'

export default {
    components: {
        Descricao, InputText, InputDate, InputRadio, Button
    },
    data(){
        return {
            initialDate: new Date(),
            onde: '',
            erros: {
                onde: null,
                usuario: null,
                contato: null,
                relato: null,
            },
            data: '',
            usuario: '',
            contato: '',
            relato: '',
        }
    },
    methods: {
        enviaFormulario(){
            this.resetaValidacao()

            this.erros.onde = "erro aqui"

            if(this.formInvalido()){
                return false
            }

            let atendimento = {
                onde: this.onde,
                data: this.data,
                usuario: this.usuario,
                contato: this.contato,
                relato: this.relato
            }

            console.log(atendimento)
        },
        formInvalido(){
            let invalido = false

            if(!this.usuario){
                this.erros.usuario = "Informe o usuário atendido"
            }

            if(!this.contato){
                this.erros.contato = "Informe o contato"
            }

            if(!this.relato){
                this.erros.relato = "Informe o relato"
            }

            return invalido
        },
        resetaValidacao(){
            this.erros = {
                usuario: null,
                contato: null,
                relato: null,
            }
        }
    }
}
</script>
<style>
</style>
