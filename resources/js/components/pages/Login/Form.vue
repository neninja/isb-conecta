<template>
    <div>
        <form>
            <InputText v-model="email" label="Email"/>
            <InputPassword v-model="password" label="Senha"/>
            <Button v-on:click="login()">
                Prosseguir
            </Button>
        </form>
    </div>
</template>
<script>
import InputText from '@/components/InputText.vue'
import InputPassword from '@/components/InputPassword.vue'
import Button from '@/components/Button.vue'
import { toastPermanente } from '@/toast.js'

export default {
    components: {
        Button, InputText, InputPassword
    },
    computed: {},
    data() {
        return {
            email: null,
            password: null,
            aviso: "success"
        }
    },
    methods: {
        csrf() {
            /*
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    //axios.post('/login',
                    axios.post('/api/login', {
                        "email": "alex@codecourse.com",
                        "password": "ilovecats"
                    }).then(response => {
                        console.log('User signed in!');
                    }).catch(error => console.log(error)); // credentials didn't match
                });
                */
        },
        login(){
            let email = this.email
            let password = this.password
            this.$store.dispatch('auth/login', { email, password })
                .then(() => {
                    this.$router.push({name: 'dashboard'})
                })
                .catch(error => {
                    toastPermanente({
                        html: error.message ?? "Erro de login",
                        classes: 'red',
                        displayLength: Infinity
                    })
                })
        },
    }
};
</script>
