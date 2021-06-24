import styled from 'styled-components'

export const Container = styled.main`
    padding: 4rem;

    h1 strong {
        text-transform: uppercase;
        display: block;
    }
`

export const P = styled.p`
    margin: 1rem 0;

`
export const ButtonContainer = styled.div`
    display: flex;
    margin-top: 4rem;

    & > * {
        width: 100%;
    }
`
