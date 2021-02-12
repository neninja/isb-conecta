<template>
    <div>
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-target="navbar-burguer" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><router-link :to="{name: 'dashboard'}">Página inicial</router-link></li>
                    <!--<li><router-link href="collapsible.html">Configurações</router-link></li>-->
                    <li v-if="isLoggedIn()"><a href="#" @click="logout()">Encerrar sessão</a></li>
                </ul>
            </div>
        </nav>

        <ul class="sidenav sidenav-close" id="navbar-burguer">
            <li><router-link :to="{name: 'dashboard'}">Página inicial</router-link></li>
            <!--<li><router-link href="collapsible.html">Configurações</router-link></li>-->
            <li v-if="isLoggedIn()"><a href="#" @click="logout()">Encerrar sessão</a></li>
        </ul>
    </div>
</template>
<script>
import { toastPermanente } from '@/toast.js'
import { mapGetters } from 'vuex'

export default {
    data(){
        return {
            instanceBurguer: null
        }
    },
    computed: {
        ...mapGetters('auth', [
            'isLoggedIn'
        ])
    },
    methods: {
        logout() {
            this.$store.dispatch('auth/logout')
                .then(() => this.$router.push({name: 'home'}))
                .catch(err => {
                    toastPermanente({
                        html: error,
                        classes: 'red',
                        displayLength: Infinity
                    })
                })
        },
    },
    created: function(){
        let v = this
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            v.instanceBurguer = M.Sidenav.init(elems, {
                edge: 'left',
            });
        });
    }
}
</script>
<style scoped>
nav {
    background-color: #005D73;
}
</style>
