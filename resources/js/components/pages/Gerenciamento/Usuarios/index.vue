<template>
    <div>
        <Descricao
            setor="Administração"
            titulo="Gerenciamento de usuários do sistema">
        Adicione, modifique ou desative usuários
        </Descricao>

        <transition name="fade">
        <div v-show="buscaAberta">
            <FormBusca @pesquisa="handlePesquisa"/>
            <Listagem
                :data="usuarios"
                :columnsData="['nome', 'setor']"
                :columnsDesc="['Nome', 'Setor']"
                :buttons="['add', 'edit', 'delete']"
                @add="handleAdd"
                @edit="handleEdit"
                @del="handleDel"
                />
        </div>
        </transition>
        <transition name="fade">
        <div v-if="!buscaAberta">
            <FormCadastro @cancel="buscaAberta=!buscaAberta" @submit="handleCreate"/>
        </div>
        </transition>
    </div>
</template>
<script>
import Descricao from '@components/Descricao.vue'
import FormBusca from './FormBusca.vue'
import FormCadastro from './FormCadastro.vue'
import Listagem from './Listagem.vue'

import { pesquisaUsuarios, criaUsuario } from '@api-backend/usuarios'
import { toast, toastPermanente } from '@/toast.js'

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
        this.handlePesquisa({
            nome: "",
            setor: ""
        })
    },
    methods: {
        handleAdd(){
            this.buscaAberta = false
        },
        handleEdit(r){
            console.log(r)
        },
        handleDel(r){
            console.log(r)
        },
        handlePesquisa(filtros){
            pesquisaUsuarios(filtros.nome, filtros.setor).then(u => {
                this.usuarios = u.map(usuario => {
                    return {
                        id: usuario.id,
                        nome: usuario.nome,
                        setor: usuario.setores[0].nome
                    }
                })
            })
        },
        handleCreate(u){
            criaUsuario(u)
                .then(r => {
                    this.buscaAberta = true

                    this.handlePesquisa({
                        nome: "",
                        setor: ""
                    })

                    toast({
                        html: 'Sucesso',
                        classes: 'green'
                    })
                })
                .catch(error => {
                    toastPermanente({
                        html: error,
                        classes: 'red'
                    })
                });
        }
    }
}
</script>
