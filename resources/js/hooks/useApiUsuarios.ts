import {
    login,
    pesquisaUsuario,
    pesquisaUsuarios
} from '@api/usuarios'

export default function useApiUsuarios() {
    return {
        login,
        pesquisaUsuario,
        pesquisaUsuarios
    }
}
