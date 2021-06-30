import { Request, Response } from 'miragejs'
import { pesquisaPorUsernameResp, loginResp } from '@api/usuarios'

export default function(server){
    const usuarios = JSON.parse(
        localStorage.getItem('@isb:dev:usuarios')
    )
    server.get("/api/username", (s, r) => {
        const u = usuarios.find(i => i.username === r.queryParams.username)
        if(u){
            return u
        }
        return new Response(400, {}, {error: ''});
    }),
    server.post("/api/login", (s, r: Request) => {
        let body = JSON.parse(r.requestBody)
        let u = body.username
        let p = body.password
        let usuario = usuarios.find(l => l.username === u && l.senha === p)
        if(usuario){
            return u
        }
        return new Response(400, {}, {error: ''});
    })
}
