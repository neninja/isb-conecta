require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import Vuex from "vuex";
import "es6-promise/auto";

import M from "materialize-css";
import "materialize-css/dist/css/materialize.min.css";
import "material-design-icons/iconfont/material-icons.css";

import App from "./App.vue";
import router from "./router";
import store from "./store";

Vue.use(Vuex);

const vuexStore = new Vuex.Store(store);

const app = new Vue({
    el: "#app",
    component: { App },
    store,
    router,
    // async beforeCreate() {
    // await this.$store.dispatch("auth/initialise_state");
    // this.$mount("#app");
    // },
    render: h => h(App)
});
