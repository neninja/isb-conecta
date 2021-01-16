//Main pages
import Home from "./components/pages/Home/Home.vue";
import Login from "./components/pages/Login/Login.vue";
import LoginWelcome from "./components/pages/Login/Welcome.vue";
import LoginEmail from "./components/pages/Login/Email.vue";
import LoginPassword from "./components/pages/Login/Password.vue";

const router = {
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/login",
            name: "login",
            component: Login,
            children: [
                {
                    path: "",
                    name: "loginWelcome",
                    component: LoginWelcome
                },
                {
                    path: "email",
                    name: "loginEmail",
                    component: LoginEmail
                },
                {
                    path: "password",
                    name: "loginPassword",
                    component: LoginPassword
                }
            ]
        }
    ]
};

export default router;
