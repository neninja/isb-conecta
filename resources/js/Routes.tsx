import React from 'react'
import { BrowserRouter, Switch, Route } from "react-router-dom";

import { AuthRoute } from '@components/AuthRoute'
import { Home } from '@pages/Home'
import { Dashboard } from '@pages/Dashboard'
import { NotFound404 } from '@pages/NotFound404'

export function Routes() {
    return (
        <BrowserRouter>
            <Switch>
                <Route exact path="/">
                    <Home />
                </Route>
                <AuthRoute exact path="/dashboard">
                    <Dashboard />
                </AuthRoute>
                <Route>
                    <NotFound404 />
                </Route>
            </Switch>
        </BrowserRouter>
    )
}
