import { Request, Response } from 'miragejs'
import { pesquisaPorUsernameResp, loginResp } from '@api/usuarios'

export default function(server){
    server.get("/api/username", (s, r) => {
        let logins: { [key: string]: pesquisaPorUsernameResp } = {
            luk: { id: 1, name: "Luke" },
            luka: { id: 1, name: "Lucas" }
        }
        let u = logins[r.queryParams.username]
        if(u){
            return u
        }
        return new Response(400, {}, {error: ''});
    }),
    server.post("/api/login", (s, r: Request) => {
        let logins: { a: {username: string; pw: string}; r: loginResp }[] = [
            {
                a: { username: 'luk', pw: '123456' },
                r: { name: "Luke" },
            },
            {
                a: { username: 'luka', pw: '321654' },
                r:{ name: "Lucas" }
            }
        ]
        let body = JSON.parse(r.requestBody)
        let u = body.username
        let p = body.password
        let usuario = logins.find(l => l.a.username === u && l.a.pw === p)
        if(usuario){
            return u
        }
        return new Response(400, {}, {error: ''});
    })
}
