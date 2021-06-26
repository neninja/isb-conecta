import React from 'react'
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from "react-router-dom";
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import { AuthProvider } from '@contexts/auth'

import { AuthRoute } from '@components/AuthRoute'
import { Header } from '@components/Header'
import { Footer } from '@components/Footer'
import { GlobalStyle } from '@/styles/global'
import { Home } from '@pages/Home'
import { Dashboard } from '@pages/Dashboard'
import { NotFound404 } from '@pages/NotFound404'

export function App(){
    return (
        <AuthProvider>
            <Router>
                <ToastContainer />
                <GlobalStyle />
                <Header />
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
                <Footer />
            </Router>
        </AuthProvider>
    )
}
