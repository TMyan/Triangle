import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store ({
    state: {
        staticData: {
            navigation: false,
            footer: false
        },
        language: 'en',
        showMinNav: false,
        loginBlock: false,
        registrationBlock: false,
        resetPasswordBlock: false,
        authenticated: false
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
        },
        visMinNav (state) {
            state.showMinNav = state.showMinNav ? false : true;
        },
        loginForm (state) {
            state.loginBlock = state.loginBlock ? false : true;
        },
        registrationForm (state) {
            state.registrationBlock = state.registrationBlock ? false : true;
        },
        resetPasswordForm (state) {
            state.resetPasswordBlock = state.resetPasswordBlock ? false : true;
        },
        authentication (state) {
            state.authenticated = state.authenticated ? false : true;
        }
    }
})
