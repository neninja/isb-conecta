import { getConfig, promiseMockadaOuNull } from './utils.js'

export function loginMock(){
    return promiseMockadaOuNull(
        "loginOk",

        getConfig('loginOk_opt') === 'usuarioAdm'
        ? { id: 2, name: "Nicolas 1", email: "nicolas@isb.com" }
        : { id: 2, name: "Nicolas 2", email: "nicolas@isb.com" },

        { message: "Login não efetuado" }
    );
}

export function authenticatedMock(){
    return promiseMockadaOuNull(
        "loginOk",

        getConfig('loginOk_opt') === 'usuarioAdm'
        ? {
                user: { name: "Nicolas", setores: [{id:1, nome: "Administração"} ]},
                message: "success"
        } : {
                user: { name: "Nicolas", setores: [{id:2, nome: "Recepção"} ]},
                message: "success"
        },

        { message: "Erro de autenticação da sessão" }
    );
}

export function logoutMock(){
    return promiseMockadaOuNull(
        "loginOk",
        { message: 'ok' },
        { message: "Erro" }
    );
}

export function pesquisaUsuariosMock() {
    return promiseMockadaOuNull(
        "pesquisaDeUsuariosOk",
        [
            {
                id: 3,
                nome: "Luiza Mockado",
                email: "rec@isb.com",
                ativo: true,
                setores: [{ id: 2, nome: "Recepção" }]
            },
            {
                id: 5,
                nome: "Felipe Mockado",
                email: "adm@i.com",
                ativo: false,
                setores: [{ id: 2, nome: "Recepção" }]
            },
            {
                id: 2,
                nome: "Nicolas Mockado",
                email: "adm@isb.com",
                ativo: true,
                setores: [{ id: 1, nome: "Administração" }]
            }
        ],
        { message: "Erro" }
    );
}

export function pesquisaUsuarioMock() {
    return promiseMockadaOuNull(
        "pesquisaDeUsuarioOk",
        [
            {
                id: 3,
                nome: "Luiza Mockado",
                email: "rec@isb.com",
                ativo: true,
                setores: [{ id: 2, nome: "Recepção" }]
            },
            {
                id: 5,
                nome: "Felipe Mockado",
                email: "adm@i.com",
                ativo: false,
                setores: [{ id: 2, nome: "Recepção" }]
            },
            {
                id: 2,
                nome: "Nicolas Mockado",
                email: "adm@isb.com",
                ativo: true,
                setores: [{ id: 1, nome: "Administração" }]
            }
        ],
        { message: "Erro" }
    );
}

export function criaUsuarioMock(){
    return promiseMockadaOuNull(
        "criacaoDeUsuariosOk",
        { message: 'ok' },
        { message: "Erro" }
    );
}

export function editaUsuarioMock(id, usuario) {
    return promiseMockadaOuNull(
        "edicaoDeUsuariosOk",
        { message: 'ok' },
        { message: "Erro" }
    );
}

export function inativaUsuarioMock(idUsuario) {
    return promiseMockadaOuNull(
        "inativacaoDeUsuariosOk",
        { message: 'ok' },
        { message: "Erro" }
    );
}

export function reativaUsuarioMock(idUsuario) {
    return promiseMockadaOuNull(
        "reativacaoDeUsuariosOk",
        { message: 'ok' },
        { message: "Erro" }
    );
}
