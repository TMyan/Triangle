import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Home from '../components/pages/home/home'
import About from '../components/pages/about/about'
import Contact from '../components/pages/contact/contact'
import Service from '../components/pages/service/service'
import Product from '../components/pages/product/product'

export default new Router ({
    mode: 'history',
    routes: [
        {
            path: '/:lang(en|am|ru)/home',
            name: 'home',
            component: Home
        },
        {
            path: '/:lang(en|am|ru)/about',
            name: 'about',
            component: About
        },
        {
            path: '/:lang(en|am|ru)/contacts',
            name: 'contact',
            component: Contact
        },
        {
            path: '/:lang(en|am|ru)/services',
            name: 'service',
            component: Service
        },
        {
            path: '/:lang(en|am|ru)/products/:manufacturer(apple|samsung|lenovo|huawei_honor|microsoft)?' +
                  '/:category(phones|computers|tablets|accessories|smart_watches)?',
            name: 'product',
            component: Product
        }
    ]
})