import React, { ReactNode } from 'react'
import styled from 'styled-components'

const Container = styled.main`
    padding: 4rem;
    width: 100%;
    display: flex;
    justify-content: center;

    & > div {
        width: 100%;
        max-width: 1100px;
    }

    h1 strong {
        text-transform: uppercase;
        display: block;
    }
`

interface MainProps {
    children: ReactNode
}

export function Main({ children }: MainProps) {
    return (
        <Container>
            <div>
                {children}
            </div>
        </Container>
    )
}
