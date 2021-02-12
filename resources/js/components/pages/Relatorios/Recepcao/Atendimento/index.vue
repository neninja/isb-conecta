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
          :opts="[
                  {n: 'porta', d: 'Porta'},
                  {n: 'telefone', d: 'Telefone'},
                 ]"/>
      <InputText v-model="usuario" label="Usuário atendido"/>
      <InputText v-model="contato" label="Contato do usuário"/>
      <InputText v-model="relato" label="Relato do atendimento" :area="true"/>
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
            data: '',
            usuario: '',
            contato: '',
            relato: '',
        }
    },
    methods: {
        enviaFormulario(){
            let atendimento = {
                onde: this.onde,
                data: this.data,
                usuario: this.usuario,
                contato: this.contato,
                relato: this.relato
            }
            console.log(atendimento)
        }
    }
}
</script>
<style>
</style>
