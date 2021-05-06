import { get, post } from "@/api/httpclient";

export function pesquisaUsuarios(nome, setor) {
    return get("/api/usuarios", {
        params: {
            nome,
            setor
        }
    });
}

export function criaUsuario(usuario) {
    return post("/api/usuarios", usuario);
}
