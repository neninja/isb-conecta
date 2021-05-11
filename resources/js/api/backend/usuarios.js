import { get, post, del, put } from "@/api/httpclient";
import * as m from "./mocks/usuarios";

export function login(email, password){
    return m.loginMock() ?? post("/api/login", {email, password})
}

export function authenticated(){
    return m.authenticatedMock() ?? get("/api/authenticated")
}

export function logout(email, password){
    return m.logoutMock() ?? get("/api/logout")
}

export function pesquisaUsuarios(nome, setor) {
    return m.pesquisaUsuariosMock() ?? get("/api/usuarios", {
        params: {
            nome,
            setor
        }
    });
}

export function pesquisaUsuario(id) {
    return m.pesquisaUsuarioMock() ?? get(`/api/usuarios/${id}`);
}

export function criaUsuario(usuario) {
    return m.criaUsuarioMock() ?? post("/api/usuarios", usuario);
}

export function editaUsuario(id, usuario) {
    return m.editaUsuarioMock() ?? put(`/api/usuarios/${id}`, usuario);
}

export function inativaUsuario(idUsuario) {
    return m.inativaUsuarioMock() ?? del(`/api/usuarios/${idUsuario}`);
}

export function reativaUsuario(idUsuario) {
    return m.reativaUsuarioMock() ?? put(`/api/usuarios/activate/${idUsuario}`);
}
