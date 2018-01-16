import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Home from '../components/pages/home/home'
import About from '../components/pages/about/about'
import Contact from '../components/pages/contact/contact'
import Service from '../components/pages/service/service'
import Product from '../components/pages/product/product'
import ProductDetails from '../components/pages/product/productDetails'

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
            path: '/:lang(en|am|ru)/products/:category(phones|computers|tablets|accessories|smartWatches)',
            name: 'product',
            component: Product,
            children: [
                {
                    path: ':product(product_[1-9][0-9]*)',
                    component: ProductDetails
                }
            ]
        }
    ]
})