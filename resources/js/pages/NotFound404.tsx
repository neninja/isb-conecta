import React from 'react'
import styled from 'styled-components'

const Container = styled.main`
    padding: 4rem;

    h1 {
        text-transform: uppercase;
    }
`

export function NotFound404() {
    return (
        <Container>
            <h1>Página não encontrada</h1>
        </Container>
    )
}
