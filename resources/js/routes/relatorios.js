import RelatorioAtendimentoRecepcao from "@components/pages/Relatorios/Recepcao/Atendimento/index.vue";
import PesquisaRelatoriosRecepcao from "@components/pages/Pesquisa/Recepcao/index.vue";

const routes = [
    {
        path: "/cadastro/recepcao/atendimento",
        meta: { requiresAuth: true, requiresSetorRecepcao: true },
        name: "cadastroAtendimentoRecepcao",
        component: RelatorioAtendimentoRecepcao
    },
    {
        path: "/pesquisa/recepcao",
        meta: { requiresAuth: true, requiresSetorAdm: true },
        name: "pesquisaRelatoriosRecepcao",
        component: PesquisaRelatoriosRecepcao
    }
];

export default routes;
