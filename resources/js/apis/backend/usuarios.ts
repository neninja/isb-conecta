import { get, post, del, put } from "@apis/httpclient";

export function login(email, password){
    console.log("debug")
    // return post("/api/login", {email, password})
}

export function authenticated(){
    return get("/api/authenticated")
}

export function logout(email, password){
    return get("/api/logout")
}

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

export function editaUsuario(id, usuario) {
    return put(`/api/usuarios/${id}`, usuario);
}

export function inativaUsuario(idUsuario) {
    return del(`/api/usuarios/${idUsuario}`);
}

export function reativaUsuario(idUsuario) {
    return put(`/api/usuarios/activate/${idUsuario}`);
}
