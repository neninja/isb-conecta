import React from 'react'
import styled from 'styled-components'

import { Label } from './Label'

const Container = styled.div`
    display: flex;
    flex-direction: column;
`

const InputText = styled.input`
    border: 0;
    border-bottom: 2px solid var(--gray-light);
    background: none;
    padding: 0.2rem 0;
    margin-bottom: 0.5rem;
`

interface InputProps extends React.InputHTMLAttributes<HTMLInputElement> {
    label: string;
}
export function Input({ label, ...rest }: InputProps) {
    return (
        <Container>
            <Label>{label}</Label>
            <InputText {...rest}/>
        </Container>
    )
}
