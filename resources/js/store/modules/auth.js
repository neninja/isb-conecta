import { login as loginApi, authenticated, logout as logoutApi } from '@api-backend/usuarios'

// actions
// ações que abstraem atualização de estado (multiplas variáveis)
const actions = {
    initialise_state({ commit }) {
        return new Promise((resolve, reject) => {
            authenticated()
                .then(response => {
                    commit("auth_success", response.user);
                    resolve(response);
                })
                .catch(error => {
                    reject(error);
                });
        });
    },
    login({ commit }, user) {
        return new Promise((resolve, reject) => {
            loginApi(user.email, user.password)
                .then(response => {
                    resolve(response);
                })
                .catch(error => {
                    commit("logout");
                    reject(error);
                });
        });
    },
    logout({ commit }) {
        return new Promise((resolve, reject) => {
            logoutApi()
                .then(response => {
                    commit("logout");
                    resolve(response);
                })
                .catch(error => {
                    commit("logout");
                    resolve(error);
                });
        });
    }
};

// mutations
// mutações de múltiplas variáveis
const mutations = {
    auth_success(state, user) {
        state.user = user;
    },
    logout(state) {
        state.user = null;
    }
};

function isSetor(state, idSetor) {
    return state.user?.setores?.findIndex(s => s.id === idSetor) > -1;
}

// getters
// pegar valores computados
const getters = {
    user: state => () => state.user,
    isLoggedIn: state => () => !!state.user,
    setor: state => () => state.user.setores,
    isAdm: state => () => isSetor(state, 1),
    isRecepcao: state => () => isSetor(state, 2)
    // isSec: state => () => state.user.setores.findIndex(s => s.id === 1) > -1
    // teste2(state) {
    // return function() {
    // state.user = "AAAA";
    // return state.user;
    // };
    // }
    //teste: state => state => {
    //    console.log(state);
    //    return true;
    //}
};

// initial state
// data() com valor inicial
const state = {
    //user: "QQQQQQQQQQ"
    user: null
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
