<template>
    <div>
        Form Cadastro
    </div>
</template>
<script>
import Descricao from '@components/Descricao.vue'
import InputText from '@components/InputText.vue'
import Button from '@components/Button.vue'

export default {
    components: {
        Descricao, InputText, Button
    },
    data(){
        return {
            nome: "",
            erros: {
                nome: ""
            },
            usuarios: [
                {
                    id: 1,
                    nome: 'Felipe',
                },
                {
                    id: 2,
                    nome: 'Ana',
                }
            ]
        }
    }
}
</script>
