import React, { ReactNode } from 'react'

import { Container, Title, HelpTip, Setor } from './styles'

interface PageInfoProps {
    name: string
    setor: string
    children: ReactNode
}

export function PageInfo({ name, setor, children }: PageInfoProps) {
    return (
        <Container>
            <Setor>{setor}</Setor>
            <Title>{name}</Title>
            {children}
            <HelpTip>Não é você ou não exerce essa função?</HelpTip>
        </Container>
    )
}
