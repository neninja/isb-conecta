import React from 'react'

import { Button } from '@components/Button'
import { Input } from '@components/Form/Input'
import { P, ButtonContainer } from './styles'

interface UsuarioProps {
    proximo: () => void;
}

export function Usuario({ proximo }: UsuarioProps) {
    return (
        <>
            <h1>Realize seu login.</h1>
            <P>
                Para realizar seu login basta entrar com o nome de usuário e a senha pré-definida que foi repassada para você. Caso não a tenha entre em contato com seu supervisor.
            </P>

            <Input label="Digite seu usuário" type="text" />

            <ButtonContainer>
                <Button onClick={e => proximo()}>Prosseguir</Button>
            </ButtonContainer>
        </>
    )
}
