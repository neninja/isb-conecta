import React, { useState } from 'react'
import { Container } from './styles'
import { Button } from '@components/Button'

import { BemVindo } from './BemVindo'
import { Usuario } from './Usuario'
import { Senha } from './Senha'

export function Home() {
    const [etapaAtual, setEtapaAtual] = useState(0)

    const etapas = [
        <BemVindo proximo={proximo} />,
        <Usuario proximo={proximo} />,
        <Senha proximo={proximo} />
    ]

    function proximo(){
        if(etapaAtual < etapas.length - 1 ) {
            setEtapaAtual(etapaAtual+1)
        }
    }

    return (
        <Container>
            {etapas[etapaAtual]}
        </Container>
    )
}
