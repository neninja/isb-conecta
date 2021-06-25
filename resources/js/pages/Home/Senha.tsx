import React from 'react'
import styled from 'styled-components'

import { Button } from '@components/Button'
import { Input } from '@components/Form/Input'
import { Checkbox } from '@components/Form/Checkbox'
import { P, ButtonContainer } from './styles'

const ContainerTip = styled.ul`
margin-bottom: 1rem;
`

const Tip = styled.li`
color: var(--gray-light);
list-style: none;
`

interface SenhaProps {
    proximo: () => void;
    setSenha: (senha: string) => void
}

export function Senha({ proximo, setSenha }: SenhaProps) {
    function handleSubmit(e: React.FormEvent<HTMLFormElement>){
        e.preventDefault()
        proximo()
    }

    return (
        <>
            <h1>Olá, Nícolas</h1>
            <P>
                Você está cadastrado na equipe de design do Instituto São Benedito.
            </P>

            <ContainerTip>
                <Tip>Não é você, ou não exerce essa função?</Tip>
            </ContainerTip>

            <form onSubmit={handleSubmit}>
                <Input
                    label="Digite sua senha"
                    type="text"
                    onChange={e => setSenha(e.target.value)}
                />
                <Checkbox label="Permanecer conectado" />

                <ButtonContainer>
                    <Button type="submit">Entrar</Button>
                </ButtonContainer>
            </form>
        </>
    )
}
