import React, { useState, useEffect } from 'react'

import { Input } from '@components/Form/Input'
import { Button } from '@components/Button'

export function ViewUsuarios() {
    const [ username, setUsername ] = useState("")
    const [ nome, setNome ] = useState("")
    const [ senha, setSenha ] = useState("")
    const [ setor, setSetor ] = useState("")

    function handleSubmit(e: React.FormEvent<HTMLFormElement>){
        e.preventDefault()
        const u = JSON.stringify([{
            id: 1,
            username,
            name: nome,
            senha,
            setor
        }])
        localStorage.setItem('@isb:dev:usuarios', u)
    }

    useEffect(() => {
        const u = JSON.parse(
            localStorage.getItem('@isb:dev:usuarios')
        )
        console.log(u)
        if(!!u[0]){
            setUsername(u[0].username)
            setNome(u[0].name)
            setSenha(u[0].senha)
            setSetor(u[0].setor)
        }
    }, [])

    return (
        <>
            <form onSubmit={handleSubmit}>
                <Input
                    label="Username"
                    type="text"
                    value={username}
                    onChange={e => setUsername(e.target.value)}
                />
                <Input
                    label="Nome"
                    type="text"
                    value={nome}
                    onChange={e => setNome(e.target.value)}
                />
                <Input
                    label="Senha"
                    type="text"
                    value={senha}
                    onChange={e => setSenha(e.target.value)}
                />
                <Input
                    label="Setor"
                    type="text"
                    value={setor}
                    onChange={e => setSetor(e.target.value)}
                />

                <Button type="submit">Salvar</Button>
            </form>
        </>
    )
}
