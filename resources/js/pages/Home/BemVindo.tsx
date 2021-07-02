import React from 'react'
import { Link } from 'react-router-dom'

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
            <ul>
                <li>
                    <strong>
                        <Link to="/conf">
                            ✨ Configuração local ✨
                        </Link>
                    </strong>
                </li>
                <li>
                    <a href="https://github.com/nenitf/isb-conecta">
                        Projeto
                    </a>
                </li>
                <li>
                    <a href="https://github.com/nenitf/isb-conecta#status">
                        Quando o projeto ficará pronto?
                    </a>
                </li>
                <li>
                    <strong>
                        <a href="https://github.com/nenitf/isb-conecta/releases">
                            🎉 "Releases de homologação de interface" 🎉
                        </a>
                    </strong>
                </li>
            </ul>

            <ButtonContainer>
                <Button onClick={e => proximo()}>Prosseguir para login</Button>
            </ButtonContainer>
        </>
    )
}
