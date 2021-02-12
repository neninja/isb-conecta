<template>
    <ul>
        <li v-for="setor in setores" :key="setor.id">
            {{ setor.nome }}
        </li>
    </ul>
</template>
<script>
import { toast } from '@/toast.js'
export default {
    data() {
        return {
            setores: []
        }
    },
    created: function(){
        axios.get('/api/setores')
            .then(response => {
                this.setores = response.data
            }).catch(error => {
                toast({
                    html: "Não foi carregada a lista de setores",
                    classes: 'red'
                })
            });
    }
}
</script>
