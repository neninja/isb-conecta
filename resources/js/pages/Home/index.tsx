import React, { useState } from 'react'
import { Container } from './styles'
import { Button } from '@components/Button'

import { BemVindo } from './BemVindo'
import { Usuario } from './Usuario'
import { Senha } from './Senha'

import useApi from '@hooks/useApiUsuarios'

export function Home() {
    const [etapaAtual, setEtapaAtual] = useState(0)
    const [ email, setEmail ] = useState("")
    const [ senha, setSenha ] = useState("")
    const { login } = useApi()

    const etapas = [
        <BemVindo proximo={proximo} />,
        <Usuario proximo={proximo} setEmail={setEmail} />,
        <Senha proximo={handleLogin} setSenha={setSenha} />
    ]

    function proximo(){
        setEtapaAtual(etapaAtual+1)
    }

    function handleLogin(){
        console.log({
            email, senha
        })
        login(email, senha)
    }

    return (
        <Container>
            {etapas[etapaAtual]}
        </Container>
    )
}
