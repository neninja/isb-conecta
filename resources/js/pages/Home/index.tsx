import React from 'react'
import { Container, P, ButtonContainer } from './styles'
import { Button } from '@components/Button'


export function Home() {
    return (
        <Container>
            <h1>Bem-vindo ao <strong>ISB Conecta</strong></h1>
            <P>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi augue neque, tincidunt non aliquet ac, fringilla quis velit. Aenean aliquet a mauris at malesuada. Pellentesque justo purus, pharetra vitae vestibulum eget, dignissim non eros.
            </P>

            <ButtonContainer>
            <Button isLink>Prosseguir para login</Button>
            </ButtonContainer>
        </Container>
    )
}
