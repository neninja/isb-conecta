import React, { ReactNode } from 'react'
import { Route, Redirect, RouteProps } from "react-router-dom";

import { useAuth } from '@contexts/auth'

import { NotFound404 } from '@pages/NotFound404'

interface AuthRouteProps extends RouteProps {
    children: ReactNode
}

export function AuthRoute({ children, ...rest }: AuthRouteProps) {
    const { signed } = useAuth()
    return (
        <Route
            {...rest}
            render={(props) =>
                signed ? (
                    <>
                    {children}
                    </>
                ) : (
                    <NotFound404 erroDeAutenticacao={true} />
                )
            }
        />
    )
}
