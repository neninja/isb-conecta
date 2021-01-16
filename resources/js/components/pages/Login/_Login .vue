<template>
    <div>
        {{message}}
        <button @click="login">Logar</button>
        <button @click="logout">Logout</button>
        <button @click="protectedr">protected</button>
        <button @click="publicr">public</button>
    </div>
</template>
<script>
const default_layout = "default";


export default {
    computed: {},
    data() {
        return {
            message:'Home'
        }
    },
    methods: {
        csrf(){
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    console.log('cookie');
                }).catch(error => console.log(error)); // credentials didn't match
        },
        login() {
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
        },
        login2(){
            axios.post('/api/login', {
                "email": "alex@codecourse.com",
                "password": "ilovecats"
            }).then(response => {
                console.log('User signed in!');
            }).catch(error => console.log(error));
        },
        logout() {
            axios.get('/api/logout')
                .then(response => {
                    console.log('User logoff!');
                }).catch(error => console.log(error));
        },
        protectedr() {
            axios.get('/api/protected-route').then(response => {
                console.log(response)
            }).catch(error => console.log(error));
        },
        publicr() {
            axios.get('/api/public-route').then(response => {
                console.log(response)
            }).catch(error => console.log(error));
        }
    }
};
</script>
