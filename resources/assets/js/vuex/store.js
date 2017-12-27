import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store ({
    state: {
        staticData: {
            header: false,
            footer: false
        },
        language: 'en'
    },
    mutations: {
        language (state, lang) {
            state.language = lang;
        },
        header (state, status) {
            state.staticData.header = status;
        },
        footer (state, status) {
            state.staticData.footer = status;
        }
    }
})
