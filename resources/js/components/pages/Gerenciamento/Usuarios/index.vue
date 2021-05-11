<template>
    <div>
        <Descricao
            setor="Administração"
            titulo="Gerenciamento de usuários do sistema">
        Adicione, modifique ou desative usuários
        </Descricao>

        <transition name="fade">
        <div v-show="buscaAberta">
            <Modal :isOpen="modalIsOpen" :header="modalTitulo" @ok="modalOk" @cancelar="modalCancelar">
            {{modalConteudo}}
            </Modal>

            <FormBusca @pesquisa="handlePesquisa"/>
            <Listagem
                :data="usuariosTabela"
                :columnsData="['nome', 'setor']"
                :columnsDesc="['Nome', 'Setor']"
                :buttons="['add']"
                :cbEdit="(row) => true"
                :cbDelete="(row) => row.ativo"
                :cbUndoDelete="(row) => !row.ativo"
                @add="handleAdd"
                @edit="handleEdit"
                @del="handleDel"
                @undel="handleUndel"
                />
        </div>
        </transition>
        <transition name="fade">
        <div v-if="!buscaAberta">
            <FormCadastro
                :id=usuarioSelecionado.id
                :initNome=usuarioSelecionado.nome
                :initSetor=usuarioSelecionado.setor
                :initEmail=usuarioSelecionado.email
                @cancel="buscaAberta=!buscaAberta"
                @submit="handleSave"
                />
        </div>
        </transition>
    </div>
</template>
<script>
import Descricao from '@components/Descricao.vue'
import FormBusca from './FormBusca.vue'
import FormCadastro from './FormCadastro.vue'
import Listagem from './Listagem.vue'
import Modal from '@components/Modal.vue'
import Button from '@components/Button.vue'

import { pesquisaUsuarios, pesquisaUsuario, criaUsuario, editaUsuario, inativaUsuario, reativaUsuario } from '@api-backend/usuarios'
import { toast, toastPermanente } from '@/toast.js'

export default {
    components: {
        Descricao, FormBusca, FormCadastro, Listagem, Modal, Button
    },
    data(){
        return {
            buscaAberta: true,
            modalIsOpen: false,
            cbModalOk: _ => null,
            cbModalCancelar: _ => null,
            modalTitulo: null,
            modalConteudo: null,
            usuarioSelecionado: {
                id: '',
                nome: '',
                setor: '',
                email: ''
            },
            usuariosTabela: []
        }
    },
    mounted: function(){
        this.handlePesquisa({
            nome: "",
            setor: ""
        })
    },
    methods: {
        modalOk(){
            this.cbModalOk()
            this.modalIsOpen = false
        },
        modalCancelar(){
            this.cbModalCancelar()
            this.modalIsOpen = false
        },
        handleAdd(){
            this.usuarioSelecionado = {
                id: '',
                nome: '',
                email: '',
                setor: ''
            },
            this.buscaAberta = false
        },
        handleEdit(u){
            pesquisaUsuario(u.id)
                .then(u => {
                    this.usuarioSelecionado = u
                    this.usuarioSelecionado.setor = u.setores[0].id
                    this.buscaAberta = false
                })
                .catch(error => {
                    toastPermanente({
                        html: error.message,
                        classes: 'red'
                    })
                })
        },
        abrirModalCancelavel(titulo, conteudo, cbOk, cbCancelar = _ => null) {
            this.modalTitulo = titulo
            this.modalConteudo = conteudo
            this.modalIsOpen = true
            this.cbModalOk = cbOk
            this.cbModalCancelar = cbCancelar
        },
        handleDel(u){
            this.abrirModalCancelavel(
                "Inativar usuário",
                `A ação a seguir vai inativar o usuário ${u.nome}`,
                _ => {
                    inativaUsuario(u.id)
                        .then(u => {
                            this.handlePesquisa({
                                nome: "",
                                setor: ""
                            })
                        })
                        .catch(error => {
                            toastPermanente({
                                html: error.message,
                                classes: 'red'
                            })
                        });
                }
            )
        },
        handleUndel(u){
            this.abrirModalCancelavel(
                "Reativar usuário",
                `A ação a seguir vai reativar o usuário ${u.nome}`,
                _ => {
                    reativaUsuario(u.id)
                    .then(u => {
                        this.handlePesquisa({
                            nome: "",
                            setor: ""
                        })
                    })
                    .catch(error => {
                        toastPermanente({
                            html: error.message,
                            classes: 'red'
                        })
                    });
                }
            )
        },
        handlePesquisa(filtros){
            pesquisaUsuarios(filtros.nome, filtros.setor)
                .then(u => {
                    this.usuariosTabela = u.map(usuario => {
                        return {
                            id: usuario.id,
                            nome: usuario.nome,
                            setor: usuario.setores[0].nome,
                            ativo: usuario.ativo
                        }
                    })
                })
                .catch(error => {
                    toastPermanente({
                        html: error.message,
                        classes: 'red'
                    })
                });

        },
        handleSave(u){
            if(u.id){
                editaUsuario(u.id, u)
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
                            html: error.message,
                            classes: 'red'
                        })
                    });

                return true
            }
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
                        html: error.message,
                        classes: 'red'
                    })
                });
        }
    }
}
</script>
