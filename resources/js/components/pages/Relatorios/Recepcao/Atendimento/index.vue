<template>
    <div>
      <Descricao
          setor="Setor de Recepção"
          titulo="Central de Setores"
          obs="Todos os campos são obrigatórios">
      Adicione as informações referentes ao atendimento realizado dentro do Instituto São Benedito.
      </Descricao>
      <InputDate v-model="data" :initialDate="initialDate" label="Data do atendimento"/>
      <InputRadioButton
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
import Descricao from '@components/Descricao.vue'
import InputText from '@components/InputText.vue'
import InputRadioButton from '@components/InputRadioButton.vue'
import InputDate from '@components/InputDate.vue'
import Button from '@components/Button.vue'
import {validateFromSchema} from '@/validations'
import { toast, toastPermanente } from '@/toast.js'

export default {
    components: {
        Descricao, InputText, InputDate, InputRadioButton, Button
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
        validate(){
            let s = {
                onde: ['empty'],
                data: ['empty'],
                usuario: ['empty'],
                contato: ['empty'],
                relato: ['empty']
            }

            let atendimento = {
                onde: this.onde,
                data: this.data,
                usuario: this.usuario,
                contato: this.contato,
                relato: this.relato
            }

            this.resetaValidacao()
            // https://forum.vuejs.org/t/how-to-clone-property-value-as-simple-object/40032/2
            // manter imutabilidade
            let erros = JSON.parse(JSON.stringify(this.erros))

            let validations = validateFromSchema(
                s, atendimento, erros, { failFast: true }
            )
            this.erros = validations.erros

            return validations.houveErro
        },
        enviaFormulario(){
            if(this.validate()){
                return false
            }

            let atendimento = {
                onde: this.onde,
                data: this.data,
                usuario: this.usuario,
                contato: this.contato,
                relato: this.relato
            }

            axios.post('/api/recepcao/atendimentos', atendimento)
                .then(response => {
                    toast({
                        html: 'Sucesso',
                        classes: 'green'
                    })
                    this.$router.push({name: 'dashboard'})
                }).catch(error => {
                    toastPermanente({
                        html: error,
                        classes: 'red'
                    })
                });
        },
        resetaValidacao(){
            this.erros = {
                onde: null,
                data: null,
                usuario: null,
                contato: null,
                relato: null
            }
        }
    }
}
</script>
<style>
</style>
