import styled from 'styled-components'

export const Container = styled.header`
    min-height: 200px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 6rem 0;

    background: var(--cyan-dark);

    position: relative;
    &::after {
        content: '';
        height: 30px;
        border-radius: 100px 100px 0 0;
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 0;
        background: var(--background);
    }
    `

export const Logo = styled.div`
    width: 60%;
    max-width: 1000px;
    min-height: 100px;
    background: #C4C4C4;

    position: relative;
    &::after {
        content: 'LOGO';
        position: absolute;
        left: 0;
        right: 0;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
`
