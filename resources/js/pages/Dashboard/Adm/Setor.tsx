import React from 'react'
import styled from 'styled-components'
import { Link } from 'react-router-dom'

import arrow from '@img/arrow-href.svg'

const Item = styled.li`
    list-style: none;

    a {
        text-decoration: none;
        display: grid;
        grid-template-columns: 1fr auto;
        grid-auto-rows: 1fr;
        grid-column-gap: 5px;
        grid-row-gap: 5px;
        align-items: center;
        margin-top: 0.7rem;
    }
`

const Label = styled.div`
    padding-left: 0.5rem;
    border-radius: 10px;
    background: var(--white);
    height: 2.5rem;

    display: flex;
    align-items: center;

    text-transform: uppercase;
    font-weight: bold;
    color: var(--cyan-dark);
`

const ButtonIcon = styled.div`
    background: var(--white);
    border-radius: 10px;
    width: 2.5rem;
    height: 2.5rem;

    display: flex;
    align-items: center;
    justify-content: center;
`

interface SetorProps {
    name: string
    to: string
}

export function Setor({ name, to }: SetorProps) {
    return (
        <Item>
            <Link to={to}>
                <Label>
                    {name}
                </Label>

                <ButtonIcon>
                    <img src={arrow}/>
                </ButtonIcon>
            </Link>
        </Item>
    )
}
