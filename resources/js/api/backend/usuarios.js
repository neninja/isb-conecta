import { get, post, del, put } from "@/api/httpclient";

export function pesquisaUsuarios(nome, setor) {
    if (promiseMockada) {
        return promiseMockada(
            "aaa",
            [
                {
                    id: 3,
                    nome: "recMockado",
                    email: "rec@isb.com",
                    ativo: true,
                    setores: [{ id: 2, nome: "Recepção" }]
                },
                {
                    id: 5,
                    nome: "felipeMockado",
                    email: "adm@i.com",
                    ativo: true,
                    setores: [
                        { id: 1, nome: "Administração" },
                        { id: 2, nome: "Recepção" }
                    ]
                },
                {
                    id: 2,
                    nome: "admMockado",
                    email: "adm@isb.com",
                    ativo: true,
                    setores: [{ id: 1, nome: "Administração" }]
                }
            ],
            "Erro grave"
        );
    }
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

function deveMockar() {
    return !!process.env.MIX_GHPAGES_TEST;
}

function promiseMockada(keyConfig, resp, err) {
    return new Promise(function(resolve, reject) {
        if (false) {
            resolve(resp);
        } else {
            reject(err);
        }
    });
}

function promiseMockada2(keyConfig, resp, err) {
    return new Promise(function(resolve, reject) {
        if (localStorate.getItem("keyConfig") === "true") {
            resolve(resp);
        } else {
            reject(err);
        }
    });
}
