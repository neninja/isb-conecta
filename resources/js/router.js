import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

//Main pages
import Home from "./components/pages/Home/Home.vue";
import Dashboard from "./components/pages/Dashboard/Dashboard.vue";
import Login from "./components/pages/Login/Login.vue";
import LoginUsernamePassword from "./components/pages/Login/UsernamePassword.vue";
// import LoginWelcome from "./components/pages/Login/Welcome.vue";
// import LoginUsername from "./components/pages/Login/Username.vue";
// import LoginPassword from "./components/pages/Login/Password.vue";

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
        }
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        axios
            .get("/api/authenticated")
            .then(response => next())
            .catch(error => {
                next({
                    path: "/login"
                });
            });
    } else {
        next(); // make sure to always call next()!
    }
});

export default router;
