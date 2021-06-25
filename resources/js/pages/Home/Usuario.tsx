import React from 'react'

import { Button } from '@components/Button'
import { Input } from '@components/Form/Input'
import { P, ButtonContainer } from './styles'

interface UsuarioProps {
    proximo: () => void;
    setEmail: (email: string) => void
}

export function Usuario({ proximo, setEmail }: UsuarioProps) {
    function handleSubmit(e: React.FormEvent<HTMLFormElement>){
        e.preventDefault()
        proximo()
    }

    return (
        <>
            <h1>Realize seu login.</h1>
            <P>
                Para realizar seu login basta entrar com o nome de usuário e a senha pré-definida que foi repassada para você. Caso não a tenha entre em contato com seu supervisor.
            </P>

            <form onSubmit={handleSubmit}>
                <Input
                    label="Digite seu usuário"
                    type="text"
                    onChange={e => setEmail(e.target.value)}
                />

                <ButtonContainer>
                    <Button type="submit">Prosseguir</Button>
                </ButtonContainer>
            </form>
        </>
    )
}
