import Vue from "vue";
import VueRouter from "vue-router";
import store from "./store";

Vue.use(VueRouter);

import Home from "./components/pages/Home/Home.vue";
import Dashboard from "./components/pages/Dashboard/Dashboard.vue";

// configurações de tela temporárias
import FrontendConfigs from "./components/pages/FrontendConfigs/index.vue";

import routesLogin from "./routes/login.js";
import routesRelatorios from "./routes/relatorios.js";
import routesGerenciamento from "./routes/gerenciamento.js";

let routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },
    {
        path: "/dashboard",
        name: "dashboard",
        meta: { requiresAuth: true },
        component: Dashboard
    },

    ...routesLogin,
    ...routesRelatorios,
    ...routesGerenciamento
];

Vue.prototype.$env_ghpages_test = false;

if (process.env.MIX_GHPAGES_TEST) {
    Vue.prototype.$env_ghpages_test = true;
    routes.push({
        path: "/frontendconfigs",
        name: "frontendconfigs",
        component: FrontendConfigs
    });
}

routes.push({
    path: "*",
    component: Home
});

const router = new VueRouter({
    mode: "history",
    routes
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
