import React, { useState } from 'react'
import { Link } from 'react-router-dom'

import { useAuth } from '@contexts/auth'

import {
    Container,
    ContainerIdentificacaoGrande,
    MenuButton,
    NomePequeno,
    NomeGrande,
    SetorPequeno,
    SetorGrande,
    Links,
    ButtonLabel,
    ButtonIcon
} from './styles'

import burgeropened from '@img/menu-burger-aberto.svg'
import burgerclosed from '@img/menu-burger-fechado.svg'
import home from '@img/home.svg'
import folder from '@img/folder.svg'
import config from '@img/config.svg'
import close from '@img/close.svg'
import calendario from '@img/calendario.svg'

interface HeaderLogadoProps {
    onLogout: () => void
}

export function HeaderLogado({ onLogout }: HeaderLogadoProps) {
    const { user } = useAuth()

    const [ menuIsOpen, setMenuIsOpen ] = useState(false)

    function handleLogout(){
        console.log("logout")
    }

    return (
        <Container logged={true}>
            <div className="menu">
                <ul className="burger-aberto">
                    {!menuIsOpen ? <span/> :
                    <li className="usuario-pequeno">
                        <NomePequeno>{user?.name}</NomePequeno>
                        <SetorPequeno>Setor de Administração</SetorPequeno>
                    </li>}
                    <MenuButton
                        opened={menuIsOpen}
                        onClick={e => setMenuIsOpen(!menuIsOpen)}
                    >
                        Menu
                        <span>
                            <div />
                            <div />
                            <div />
                        </span>
                    </MenuButton>
                </ul>
                <Links opened={menuIsOpen}>
                    <li>
                        <Link to="dashboard">
                            <ButtonLabel>
                                <img src={home}/>
                            </ButtonLabel>
                            <ButtonLabel>
                                Página inicial
                            </ButtonLabel>
                        </Link>
                    </li>
                    <li>
                        <Link to="dashboard">
                            <ButtonLabel>
                                <img src={folder}/>
                            </ButtonLabel>
                            <ButtonLabel>
                                Relatórios
                            </ButtonLabel>
                        </Link>
                    </li>
                    <li>
                        <Link to="dashboard">
                            <ButtonLabel>
                                <img src={config}/>
                            </ButtonLabel>
                            <ButtonLabel>
                                Configurações
                            </ButtonLabel>
                        </Link>
                    </li>
                    <li className="logout">
                        <Link to="/" onClick={e => onLogout()}>
                            <ButtonLabel>
                                <img src={close}/>
                            </ButtonLabel>
                            <ButtonLabel>
                                Encerrar sessão
                            </ButtonLabel>
                        </Link>
                    </li>
                </Links>
                {menuIsOpen ? <span/> :
                <ContainerIdentificacaoGrande>
                    <li>
                        <NomeGrande>{user?.name}</NomeGrande>
                        <SetorGrande>Setor de Administração</SetorGrande>
                    </li>
                    <li>
                        <ButtonIcon>
                            <img src={calendario}/>
                        </ButtonIcon>
                    </li>
                </ContainerIdentificacaoGrande>}
            </div>
        </Container>
    )
}
