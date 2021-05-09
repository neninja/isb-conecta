<template>
    <div>
        <table class="centered striped">
            <thead>
            <tr>
                <th>
                    Configuração
                </th>
                <th>
                    Retorno com sucesso?
                </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(config, i) in configsBooleanas" :key="i">
                    <td>
                        {{config.name}}
                    </td>
                    <td>
                        <div class="switch">
                            <InputCheckbox v-model="config.value" :checked="config.value" @input="changeBoolean(config.key)"/>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import InputCheckbox from '@components/InputCheckbox.vue'

export default {
    components: {
        InputCheckbox
    },
    data() {
        return {
            configsBooleanas: [
                {
                    key: 'loginOk',
                    name: "Login",
                    value: null
                },
                {
                    key: 'cadastroRecepcaoAtendimentoOk',
                    name: "Cadastro de Atendimento na Recepção",
                    value: null
                },
                {
                    key: 'cadastroDeUsuariosOk',
                    name: "Cadastro de usuários",
                    value: null
                },
                {
                    key: 'edicaoDeUsuariosOk',
                    name: "Edição de usuários",
                    value: null
                },
            ]
        }
    },
    mounted(){
        for(let i = 0; i < this.configsBooleanas.length; i++){
            this.configsBooleanas[i].value = localStorage.getItem(this.configsBooleanas[i].key) === 'true' ?? false
        }
    },
    methods: {
        changeBoolean(k){
            let prop = this.configsBooleanas.find(p => p.key === k)
            localStorage.setItem(k, prop.value)
        }
    }

}
</script>
