import React, { useEffect } from 'react'

import { Container, Logo } from './styles'

import { useAuth } from '@contexts/auth'

import { HeaderLogado } from './HeaderLogado'

export function Header() {
    const { signed, user, logout } = useAuth()

    useEffect(() => {
        console.log(user)
    }, [user])

    if(!user) {
        return (
            <Container>
                <Logo />
            </Container>
        )
    }

    return (
        <HeaderLogado onLogout={logout} />
    )
}
