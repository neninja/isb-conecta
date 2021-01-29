require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";

import M from "materialize-css";
import "materialize-css/dist/css/materialize.min.css";

import App from "./App.vue";
import router from "./router";

const app = new Vue({
    el: "#app",
    components: { App },
    router
});
