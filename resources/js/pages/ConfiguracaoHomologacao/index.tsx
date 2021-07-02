import React from 'react'

import { BrowserRouter, Switch, Route, Link } from "react-router-dom";

import { Main } from '@components/Main'
import { ViewUsuarios } from './ViewUsuarios'

export const routes = [
    {
        path: '/conf',
        component: ConfiguracaoHomologacao
    },
    {
        path: '/conf/usuarios',
        component: ViewUsuarios
    }
]

export function ConfiguracaoHomologacao() {
    return (
        <Main>
            <h1>Configurações</h1>
            <ul>
                <li>
                    <Link to={{pathname: "/conf/usuarios"}}>
                        Usuário para login
                    </Link>
                </li>
            </ul>
        </Main>
    )
}
