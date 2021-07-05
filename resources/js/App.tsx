import React from 'react'

import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

import { AuthProvider } from '@contexts/auth'

import { GlobalStyle } from '@/styles/global'
import { Footer } from '@components/Footer'

import { Routes } from './Routes'

export function App(){
    return (
        <AuthProvider>
            <ToastContainer />
            <GlobalStyle />
            <Routes />
            <Footer />
        </AuthProvider>
    )
}
