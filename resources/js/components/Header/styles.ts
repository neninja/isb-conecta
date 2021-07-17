import styled from 'styled-components'

interface ContainerProps {
    logged: boolean
}

export const ContainerIdentificacaoGrande = styled.ul`
    padding-top: 1rem;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-between;

    li {
        display: flex;
        flex-direction: column;
    }
`

export const Container = styled.header<ContainerProps>`
    display: flex;
    align-items: center;
    justify-content: center;

    padding: ${p => p.logged ? "2rem" : "6rem 0"};
    min-height: ${p => p.logged ? "0" : "200px"};

    /*background: var(${(p) => p.erro ? '--error-color' : '--cyan-dark'});*/
    background: var(--cyan-dark);
    color: var(--white);

    padding-bottom: 4rem;
    position: relative;
    &::after {
        content: '';
        height: 2rem;
        border-radius: 100px 100px 0 0;
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 0;
        background: var(--background);
    }

    .menu {
        width: 100%;
        margin: 0 1rem;
    }

    .burger-aberto {
        display: flex;
        list-style: none;
        justify-content: space-between;

        align-items: center;

        .usuario-pequeno {
            display: flex;
            flex-direction: column;
        }
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

// THANKS: https://css-tricks.com/hamburger-menu-with-a-side-of-react-hooks-and-styled-components/
interface MenuButton {
    opened: boolean
}

export const MenuButton = styled.li`
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;

    text-transform: uppercase;
    display: flex;

    img {
        margin-left: 0.4rem;
    }

    span {
        margin-left: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        width: 1.5rem;
        height: 1.5rem;
        background: transparent;
        border: none;
        padding: 0;
        z-index: 10;

        &:focus {
            outline: none;
        }

        div {
            width: 1.5rem;
            height: 0.1rem;
            background: var(--white);
            border-radius: 10px;
            transition: all 0.3s linear;
            position: relative;
            transform-origin: 1px;

            &:first-child {
                transform: ${p => p.opened ? 'rotate(45deg)' : 'rotate(0)'};
            }

            &:nth-child(2) {
                opacity: ${p => p.opened ? '0' : '1'};
                transform: ${p => p.opened ? 'translateX(20px)' : 'translateX(0)'};
            }

            &:nth-child(3) {
                transform: ${p => p.opened ? 'rotate(-45deg)' : 'rotate(0)'};
            }
        }
    }
`

export const NomePequeno = styled.span`
    font-weight: bold;
`

export const NomeGrande = styled.span`
    font-weight: bold;
    font-size: 1.5rem;
`

export const SetorPequeno = styled.span`
`

export const SetorGrande = styled.span`
`

export const ButtonLabel = styled.div`
    text-transform: uppercase;
    font-weight: bold;

    background: var(--cyan-light);
    width: auto;
    border-radius: 10px;
    min-width: 2rem;
    min-height: 2rem;

    display: flex;
    align-items: center;
    justify-content: center;

    & + div {
        margin-left: 0.2rem;
        justify-content: start;
        padding-left: 1rem;
    }
`

export const ButtonIcon = styled.div`
    background: var(--cyan-light);
    border-radius: 10px;
    width: 2.5rem;
    height: 2.5rem;

    display: flex;
    align-items: center;
    justify-content: center;
`

interface LinksProps {
    opened: boolean
}
export const Links = styled.ul<LinksProps>`
    display: flex;

    transition: max-height 0.2s ease-in-out;
    max-height: ${p => p.opened ? "100vh" : "0"};

    list-style: none;
    flex-direction: column;

    li {
        overflow: hidden;
    }

    li a {
        align-items: center;
        margin-top: 0.7rem;

        display: grid;
        grid-template-columns: auto 1fr;
        grid-auto-rows: 1fr;
        grid-column-gap: 5px;
        grid-row-gap: 5px;
        color: var(--cyan-dark);
    }

    & li:first-child {
        margin-top: 0;
    }

    a {
        text-decoration: none;
    }

    a:visited {
        color: var(--cyan-dark);
    }

    .logout a:visited {
        color: var(--red);
    }
`
