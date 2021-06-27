import React, { useState } from 'react'
import { useHistory } from "react-router-dom";

import { toast } from 'react-toastify';
import { Main } from '@components/Main'
import { Button } from '@components/Button'

import { BemVindo } from './BemVindo'
import { Username } from './Username'
import { Senha } from './Senha'

import { useAuth } from '@contexts/auth'
import useApi from '@hooks/useApiUsuarios'

export function Home() {
    const history = useHistory();
    const { login } = useAuth()
    const { pesquisaPorUsername } = useApi()

    const [etapaAtual, setEtapaAtual] = useState(0)
    const [ nome, setNome ] = useState("")
    const [ username, setUsername ] = useState("")

    const etapas = [
        <BemVindo proximo={proximo} />,
        <Username proximo={validaUsername} />,
        <Senha proximo={handleLogin} nome={nome} />
    ]

    function proximo(){
        setEtapaAtual(etapaAtual+1)
    }

    function validaUsername(u){
        pesquisaPorUsername(u).then(resp => {
            setNome(resp.name)
            setUsername(u)
            proximo()
        }).catch(_ => toast.error('Login não encontrado'))
    }

    function handleLogin(senha: string){
        login(username, senha).then(resp => {
            history.push('/dashboard')
        }).catch(_ => toast.error('Credenciais incorretas'))
    }

    return (
        <Main>
            {etapas[etapaAtual]}
        </Main>
    )
}
