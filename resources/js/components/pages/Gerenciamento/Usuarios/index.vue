<template>
    <div>
        <Descricao
            setor="Administração"
            titulo="Gerenciamento de usuários do sistema">
        Adicione, modifique ou desative usuários
        </Descricao>

        <transition name="fade">
        <div v-show="buscaAberta">
            <FormBusca @pesquisa="pesquisa"/>
            <Listagem
                :data="usuarios"
                :columnsData="['nome', 'setor']"
                :columnsDesc="['Nome', 'Setor']"
                :buttons="['add', 'edit', 'delete']"
                @add="add"
                @edit="edit"
                @del="del"
                />
        </div>
        </transition>
        <transition name="fade">
        <div v-show="!buscaAberta">
            <FormCadastro/>
        </div>
        </transition>
    </div>
</template>
<script>
import Descricao from '@components/Descricao.vue'
import FormBusca from './FormBusca.vue'
import FormCadastro from './FormCadastro.vue'
import Listagem from './Listagem.vue'

import { pesquisaUsuarios } from '@api-backend/usuarios'

export default {
    components: {
        Descricao, FormBusca, FormCadastro, Listagem
    },
    data(){
        return {
            buscaAberta: true,
            usuarios: []
        }
    },
    mounted: function(){
        this.pesquisa({
            nome: "",
            setor: ""
        })
    },
    methods: {
        add(){
            console.log("add")
        },
        edit(r){
            console.log(r)
        },
        del(r){
            console.log(r)
        },
        pesquisa(filtros){
            pesquisaUsuarios(filtros.nome, filtros.setor).then(u => {
                this.usuarios = u.map(usuario => {
                    return {
                        id: usuario.id,
                        nome: usuario.nome,
                        setor: usuario.setores[0].nome
                    }
                })
            })
        }
    }
}
</script>
