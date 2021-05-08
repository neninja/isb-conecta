import { get, post, del, put } from "@/api/httpclient";

export function pesquisaUsuarios(nome, setor) {
    return get("/api/usuarios", {
        params: {
            nome,
            setor
        }
    });
}

export function pesquisaUsuario(id) {
    return get(`/api/usuarios/${id}`);
}

export function criaUsuario(usuario) {
    return post("/api/usuarios", usuario);
}

export function inativaUsuario(idUsuario) {
    return del(`/api/usuarios/${idUsuario}`);
}

export function reativaUsuario(idUsuario) {
    return put(`/api/usuarios/activate/${idUsuario}`);
}
