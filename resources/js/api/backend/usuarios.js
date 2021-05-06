import { get } from "@/api/httpclient";

export function pesquisaUsuarios(nome, setor) {
    return get("/api/usuarios", {
        params: {
            nome,
            setor
        }
    });
}
