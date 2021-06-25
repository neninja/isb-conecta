import React from 'react'

import { Button } from '@components/Button'
import { P, ButtonContainer } from './styles'

interface BemVindoProps {
    proximo: () => void;
}

export function BemVindo({ proximo }: BemVindoProps) {
    return (
        <>
            <h1>Bem-vindo ao <strong>ISB Conecta</strong></h1>
            <P>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi augue neque, tincidunt non aliquet ac, fringilla quis velit. Aenean aliquet a mauris at malesuada. Pellentesque justo purus, pharetra vitae vestibulum eget, dignissim non eros.
            </P>

            <ButtonContainer>
                <Button onClick={e => proximo()}>Prosseguir para login</Button>
            </ButtonContainer>
        </>
    )
}
