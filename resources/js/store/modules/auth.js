// actions
// ações que abstraem atualização de estado (multiplas variáveis)
const actions = {
    initialise_state({ commit }) {
        return new Promise((resolve, reject) => {
            axios
                .get("/api/authenticated")
                .then(response => {
                    commit("auth_success", response.data.user);
                    resolve(response);
                })
                .catch(error => {
                    reject(error);
                });
        });
    },
    login({ commit }, user) {
        return new Promise((resolve, reject) => {
            axios
                .post("/api/login", {
                    email: user.email,
                    password: user.password
                })
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
            axios
                .get("/api/logout")
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

// getters
// pegar valores computados
const getters = {
    user: state => () => state.user,
    isLoggedIn: state => () => !!state.user,
    setor: state => () => state.user.setores
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
