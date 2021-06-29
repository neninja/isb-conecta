import React, { createContext, useState, useEffect, useContext } from 'react';

interface Usuario {
    name: string
}

interface ErroContextData {
    erro: string
    setErro: (e: string) => void
}

const ErroContext = createContext<ErroContextData>({} as ErroContextData);

export function ErroProvider({ children }) {
    const [erro, setErro] = useState("");

    return (
        <ErroContext.Provider
            value={{ erro, setErro }}
        >
            {children}
        </ErroContext.Provider>
    );
};

export function useErro() {
    const context = useContext(ErroContext);

    return context;
}
