// THANKS: https://github.com/rafacdomin/Auth-React-ContextAPI

import React, { createContext, useState, useEffect, useContext } from 'react';

import useApi from '@hooks/useApiUsuarios'

interface Usuario {
    name: string
}

interface AuthContextData {
    signed: boolean;
    user: object | null;
    login(username: string, senha: string): Promise<any>;
    logout(): Promise<any>;
}

const AuthContext = createContext<AuthContextData>({} as AuthContextData);

export function AuthProvider({ children }) {
    const api = useApi()
    const [user, setUser] = useState<Usuario | null>(null);

    useEffect(() => {
        const storagedUser = sessionStorage.getItem('@isbconecta:user');

        if (storagedUser) {
            setUser(JSON.parse(storagedUser));
        }
    }, []);

    useEffect(() => {
        sessionStorage.setItem('@isbconecta:user', JSON.stringify(user));
    }, [user]);

    function login(username, senha) {
        return new Promise(function(resolve, reject) {
            api.login(username, senha).then((resp) => {
                setUser(resp)
                resolve(resp)
            }).catch(resp => {
                setUser(null)
                reject(resp)
            })
        })
    }

    function logout() {
        return new Promise(function(resolve, reject) {
            api.logout().then((resp) => {
                setUser(null)
                resolve(resp)
            }).catch(resp => {
                setUser(null)
                reject(resp)
            })
        })
    }

    return (
        <AuthContext.Provider
            value={{ signed: Boolean(user), user, login, logout }}
        >
            {children}
        </AuthContext.Provider>
    );
};

export function useAuth() {
    const context = useContext(AuthContext);

    return context;
}
