import React from 'react'

import { Container, Logo } from './styles'

import { useAuth } from '@contexts/auth'
export function Header() {
    const { signed } = useAuth()
    return (
        <>
            <Container>
                <Logo />
            </Container>
        </>
    )
}
