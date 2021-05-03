import Gerenciamento from "@components/pages/Gerenciamento/index.vue";
import GerenciamentoUsuarios from "@components/pages/Gerenciamento/Usuarios/index.vue";

const routes = [
    {
        path: "/gerenciamento/usuario",
        name: "gerenciamentoUsuarios",
        meta: { requiresAuth: true, requiresSetorAdm: true },
        component: GerenciamentoUsuarios
    }
];

export default routes;
