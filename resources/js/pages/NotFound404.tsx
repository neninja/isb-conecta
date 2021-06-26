import React, { useEffect } from 'react'
import { useHistory } from "react-router-dom";
import { useAuth } from '@contexts/auth'
import styled from 'styled-components'

const Container = styled.main`
    padding: 4rem;

    h1 {
        text-transform: uppercase;
    }
`

interface NotFoundProps {
    erroDeAutenticacao?: boolean
}

export function NotFound404({ erroDeAutenticacao }: NotFoundProps) {
    const history = useHistory();
    const { signed } = useAuth()
    useEffect(() => {
        if(erroDeAutenticacao && signed){
            history.goBack()
        }
    }, [signed])
    return (
        <Container>
            <h1>Página não encontrada</h1>
        </Container>
    )
}
