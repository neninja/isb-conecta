import React from 'react'
import { BrowserRouter, Switch, Route } from "react-router-dom";
import { AuthRoute } from '@components/AuthRoute'

import { Home } from '@pages/Home'

import { routes as routesConfig } from '@pages/ConfiguracaoHomologacao'
import { ViewUsuarios } from '@pages/ConfiguracaoHomologacao/ViewUsuarios'

import { Dashboard } from '@pages/Dashboard'
import { NotFound404 } from '@pages/NotFound404'

export function Routes() {
    function importRoutes(routesStruct){
        return routesStruct.map(r => (
            <Route exact path={r.path}
                key={r.path}
                component={r.component}
            />
        ))
    }

    return (
        <BrowserRouter>
            <Switch>
                <Route exact path="/" component={Home} />

                {...importRoutes(routesConfig)}

                <AuthRoute exact path="/dashboard">
                    <Dashboard />
                </AuthRoute>

                <Route component={NotFound404} />
            </Switch>
        </BrowserRouter>
    )
}
