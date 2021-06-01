import React from 'react'
import { Header } from '@components/Header'
import { GlobalStyle } from '@/styles/global'

export function App(){
    return (
        <>
            <Header />
            <GlobalStyle />
            <h1>Bem vindo ao <strong>ISB Conecta</strong></h1>
        </>
    )
}
