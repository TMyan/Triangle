import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store ({
    state: {
        staticData: {
            navigation: false,
            footer: false
        },
        language: 'en'
    },
    mutations: {
        language (state, lang) {
            state.language = lang;
        },
        navigation (state, status) {
            state.staticData.navigation = status;
        },
        footer (state, status) {
            state.staticData.footer = status;
        }
    }
})
