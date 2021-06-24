import React, { ReactNode } from 'react'
import styled from 'styled-components'

const Container = styled.button`
    background: var(--cyan-dark);
    color: var(--white);
    padding: 1rem;
    text-transform: uppercase;
    border-radius: 10px;
    box-shadow: 0 0 0.2rem black;

    &:active {
        box-shadow: 0 0 0.1rem black;
        transform: translateY(2px);
        filter: brightness(85%);
    }

    &:hover {
        filter: brightness(85%);
    }
`

interface ButtonProps {
    children: ReactNode;
    isLink: boolean;
}

export function Button({children}: ButtonProps) {
    return (
        <Container>
            {children}
        </Container>
    )
}
