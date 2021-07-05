import { get, post, del, put } from "@apis/httpclient";

export interface loginResp {
    username: string
    name: string
}

export function login(username, password){
    return post("/api/login", {
        username,
        password
    }) as Promise<loginResp>;
}

export function authenticated(){
    return get("/api/authenticated")
}

export function logout(){
    return get("/api/logout")
}

export interface pesquisaPorUsernameResp {
    id: number
    name: string
}
export function pesquisaPorUsername(username): Promise<pesquisaPorUsernameResp> {
    return get("/api/username", {
        params: { username }
    }) as Promise<pesquisaPorUsernameResp>;
}

export function pesquisaUsuarios({nome, setor, username}) {
    return get("/api/usuarios", {
        params: {
            username,
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
