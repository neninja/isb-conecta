import Vue from "vue";
import Vuex from "vuex";
import auth from "./modules/auth";

import createPersistedState from "vuex-persistedstate";
/*
 Erro no mapa de código: Error: JSON.parse: unexpected character at line 1 column 1 of the JSON data
URL do recurso: http://localhost:8000/js/app.js
URL do mapa de código: vuex-persistedstate.es.js.map
*/

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth
    },
    plugins: [createPersistedState()]
});
