<template>
    <div>
        <form>
            <div class="row">
                <div class="input-field col s6 active">
                    <input
                        v-model="email"
                        id="email"
                        class="validate"
                        type="text">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s6 active">
                    <input
                        v-model="password"
                        id="password"
                        class="validate"
                        type="password">
                    <label for="password">Senha</label>
                </div>
            </div>

            <Button v-on:click="login()">
                Prosseguir
            </Button>
        </form>
    </div>
</template>
<script>
import Button from '@/components/Button.vue'
import { toastPermanente } from '@/toast.js'

export default {
    components: {
        Button
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
                        html: error,
                        classes: 'red',
                        displayLength: Infinity
                    })
                })
        },
    }
};
</script>
