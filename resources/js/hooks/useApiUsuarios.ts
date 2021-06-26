import {
    login,
    logout,
    pesquisaPorUsername,
    pesquisaUsuario,
    pesquisaUsuarios
} from '@api/usuarios'

export default function useApiUsuarios() {
    return {
        login,
        logout,
        pesquisaPorUsername,
        pesquisaUsuario,
        pesquisaUsuarios
    }
}
