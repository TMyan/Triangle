
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './components/App'
import router from './router/index'
import store from './vuex/store'
import VeeValidate from 'vee-validate'
import Carousel3d from 'vue-carousel-3d';


Vue.use(Carousel3d);
Vue.use(VeeValidate);
const app = new Vue({
    el: '#app',
    template: '<App/>',
    router,
    store,
    components: {
        App
    }
});
