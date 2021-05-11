<template>
    <div>
        <table class="centered highlight responsive-table">
            <thead>
                <tr>
                    <th>
                        Sucesso?
                    </th>
                    <th>
                        Configuração
                    </th>
                    <th>
                        Key
                    </th>
                    <th>
                        Opções
                    </th>
                </tr>
            </thead>
            <tbody v-for="(grupo, i) in configsBooleanas" :key="i">
                <tr>
                    <td colspan="3" class="caption">{{grupo.grupo}}</td>
                </tr>
                <tr v-for="(config, k) in grupo.config" :key="k">
                    <td>
                        <InputCheckbox v-model="config.value" :checked="config.value" @input="changeBoolean(i, k)"/>
                    </td>
                    <td>
                        <pre>{{k}}</pre>
                    </td>
                    <td>
                        {{config.name}}
                    </td>
                    <td>
                        <InputRadio
                            v-if="config.opts"
                            :opts="config.opts"
                            v-model="config.optSelected"
                            :checkedValue="config.optSelected"
                            @input="setLocalStorage(config.optKey, config.optSelected)"
                            />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
table .caption {
    font-size: 1.5rem;
}

table pre {
    font-size: .8rem;
}
</style>

<script>
import InputCheckbox from '@components/InputCheckbox.vue'
import InputRadio from '@components/InputRadio.vue'

export default {
    components: {
        InputRadio, InputCheckbox
    },
    data() {
        return {
            configsBooleanas: [
                {
                    grupo: "Autenticação",
                    config: {
                        loginOk: {
                            name: "Login",
                            value: null,
                            opts: [
                                {
                                    n: 'usuarioAdm',
                                    d: 'Usuário de adminsitração',
                                },
                                {
                                    n: 'usuarioRec',
                                    d: 'Usuário da recepção',
                                }
                            ],
                            optSelected: null,
                            optKey: 'loginOk_opt'
                        }
                    }
                },
                {
                    grupo: "Recepção",
                    config: {
                        criacaoRecepcaoAtendimentoOk: {
                            name: "Criação de Atendimento na Recepção",
                            value: null
                        }
                    }
                },
                {
                    grupo: "Gerenciamento de usuários",
                    config: {
                        pesquisaDeUsuariosOk: {
                            name: "Pesquisa de usuários",
                            value: null
                        },
                        pesquisaDeUsuarioOk: {
                            name: "Informações específicas de um usuário",
                            value: null
                        },
                        criacaoDeUsuariosOk: {
                            name: "Criação de usuários",
                            value: null
                        },
                        edicaoDeUsuariosOk: {
                            name: "Edição de usuários",
                            value: null
                        },
                        inativacaoDeUsuariosOk: {
                            name: "Inativação de usuários",
                            value: null
                        },
                        reativacaoDeUsuariosOk: {
                            name: "Reativação de usuários",
                            value: null
                        },
                    }
                }
            ]
        }
    },
    mounted(){
        for(let i = 0; i < this.configsBooleanas.length; i++){
            let keys = Object.keys(this.configsBooleanas[i].config)
            for(let key of keys){
                this.configsBooleanas[i].config[key].value = this.getLocalStorage(key) === 'true'
                if(this.configsBooleanas[i].config[key].opts){
                    this.configsBooleanas[i].config[key].optSelected = this.getLocalStorage(
                        this.configsBooleanas[i].config[key].optKey
                    )
                }
            }
        }
    },
    methods: {
        changeBoolean(grupoI, k){
            let prop = this.configsBooleanas[grupoI].config[k]
            this.setLocalStorage(k, prop.value)
        },
        getLocalStorage(key){
            return localStorage.getItem(`dev_${key}`)
        },
        setLocalStorage(key, value){
            localStorage.setItem(`dev_${key}`, value)
        }

    }

}
</script>
