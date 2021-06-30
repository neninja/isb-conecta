import React from 'react'

import { BrowserRouter, Switch, Route, Link } from "react-router-dom";

import { Main } from '@components/Main'
import { ViewUsuarios } from './ViewUsuarios'

export function ConfiguracaoHomologacao() {
    return (
        <Main>
        <BrowserRouter>
            <Switch>
                <Route exact path="/configuracao">
                    <h1>Configurações</h1>
                    <ul>
                        <li>
                            <Link to="/configuracao/usuarios">
                                Usuário para login
                            </Link>
                        </li>
                    </ul>
                </Route>
                <Route
                    exact path="/configuracao/usuarios"
                    component={ViewUsuarios}
                />
            </Switch>
        </BrowserRouter>
        </Main>
    )
}
