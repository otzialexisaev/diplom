/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import VueRouter from 'vue-router';
import Vuetify from "vuetify";
import AdminTestCreate from './pages/Admin/Test/Create';
import AdminMaterialCreate from './pages/Admin/Material/Create';
import NotFound from './pages/NotFound';
import AdminSubjectCreate from './pages/Admin/Subject/Create';
import AdminTestsIndex from './pages/Admin/Test/Index';
import AdminTestsId from './pages/Admin/Test/Id';
import Layout from './layouts/Main';
import 'vuetify/dist/vuetify.css';

Vue.use(VueRouter);
Vue.use(Vuetify);

import store from './store/main';

const routes = [
    {
        path: '/admin/test/index', component: AdminTestsIndex
    },
    {
        path: '/admin/test/:id', component: AdminTestsId
    },
    {
        path: '/admin/test/create', component: AdminTestCreate
    },
    {
        path: '/admin/material/create', component: AdminMaterialCreate
    },
    {
        path: '/admin/subject/create', component: AdminSubjectCreate
    },
    {
        path: '*', component: NotFound
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    store,
    vuetify: new Vuetify(),
    components: {Layout},
    template: '<v-app><Layout></Layout></v-app>'
}).$mount('#vue');
