require("./bootstrap");

require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

//Main pages
import App from "./App.vue";
import Home from "./views/Home.vue";
import Hello from "./views/Hello.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/hello",
            name: "hello",
            component: Hello
        }
    ]
});

const app = new Vue({
    el: "#app",
    components: { App },
    router
});

/*

// import Vue from "vue";
window.Vue = require("vue");

Vue.component("hello", require("./components/Hello.vue").default);

const app = new Vue({
    el: "#app"
    // components: { App },
    // router,
});
*/
/*
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './views/App'
import About from './views/About'
import Home from './views/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
*/
