import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";

Vue.use(VueRouter);

//Main pages
import Home from "./components/pages/Home/Home.vue";
import Dashboard from "./components/pages/Dashboard/Dashboard.vue";
import Login from "./components/pages/Login/Login.vue";
import LoginUsernamePassword from "./components/pages/Login/UsernamePassword.vue";
// import LoginWelcome from "./components/pages/Login/Welcome.vue";
// import LoginUsername from "./components/pages/Login/Username.vue";
// import LoginPassword from "./components/pages/Login/Password.vue";

import Relatorios from "./components/pages/Relatorios/index.vue";
import RouterView from "./components/RouterView.vue";
import RelatorioAtendimentoRecepcao from "./components/pages/Relatorios/Recepcao/Atendimento/index.vue";
import PesquisaRelatoriosRecepcao from "./components/pages/Pesquisa/Recepcao/index.vue";

import R from "./components/pages/Login/UsernamePassword.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/login",
            component: Login,
            children: [
                {
                    path: "",
                    name: "login",
                    component: LoginUsernamePassword
                }
                // {
                // path: "",
                // name: "loginWelcome",
                // component: LoginWelcome
                // },
                // {
                // path: "username",
                // name: "loginUsername",
                // component: LoginUsername
                // },
                // {
                // path: "password",
                // name: "loginPassword",
                // component: LoginPassword
                // }
            ]
        },
        {
            path: "/dashboard",
            name: "dashboard",
            meta: { requiresAuth: true },
            component: Dashboard
        },
        {
            path: "/cadastro",
            meta: { requiresAuth: true },
            component: Relatorios,
            children: [
                {
                    path: "recepcao",
                    component: RouterView,
                    meta: { requiresSetorRecepcao: true },
                    children: [
                        {
                            path: "atendimento",
                            name: "cadastroAtendimentoRecepcao",
                            component: RelatorioAtendimentoRecepcao
                        }
                    ]
                }
            ]
        },
        {
            path: "/pesquisa",
            meta: { requiresAuth: true, requiresSetorAdm: true },
            component: RouterView,
            children: [
                {
                    path: "recepcao",
                    name: "pesquisaRelatoriosRecepcao",
                    component: PesquisaRelatoriosRecepcao
                }
            ]
        },
        {
            path: "*",
            component: Home
        }
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        store
            .dispatch("auth/initialise_state")
            .then(response => {
                next();
            })
            .catch(error => {
                next({
                    path: "/login"
                });
            });
    }

    const validaTrueFalse = teste => {
        if (teste) {
            next();
        } else {
            next({
                path: "/login"
            });
        }
    };

    if (to.matched.some(record => record.meta.requiresSetorAdm)) {
        validaTrueFalse(store.getters["auth/isAdm"]());
    }

    if (to.matched.some(record => record.meta.requiresSetorRecepcao)) {
        validaTrueFalse(store.getters["auth/isRecepcao"]());
    }

    next(); // make sure to always call next()!
});

export default router;
