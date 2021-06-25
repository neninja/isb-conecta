import React from 'react'
import styled from 'styled-components'

import { Label } from './Label'

const Container = styled.div`
    display: flex;

    label {
        cursor: pointer;
    }
`

const Input = styled.input`
    border: 0;
    border-bottom: 2px solid var(--gray-light);
    background: none;
    padding: 0.2rem 0;
    margin-right: 0.5rem;
`

interface CheckboxProps extends React.InputHTMLAttributes<HTMLInputElement> {
    label: string;
}
export function Checkbox({ label, ...rest }: CheckboxProps) {
    return (
        <Container>
            <Label>
                <Input {...rest} type="checkbox"/>
                {label}
            </Label>
        </Container>
    )
}
