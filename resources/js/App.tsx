import React from 'react'
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

import { Header } from '@components/Header'
import { Footer } from '@components/Footer'
import { GlobalStyle } from '@/styles/global'
import { Home } from '@pages/Home'
import { NotFound404 } from '@pages/NotFound404'

export function App(){
    return (
        <Router>
            <GlobalStyle />
            <Header />
            <Switch>
                <Route exact path="/">
                    <Home />
                </Route>
                <Route>
                    <NotFound404 />
                </Route>
            </Switch>
            <Footer />
        </Router>
    )
}
