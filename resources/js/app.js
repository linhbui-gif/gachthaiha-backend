require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);


import NewsCategoryIndex from './components/admin/news_categories/NewsCategoryIndex';
import NewsCategoryCreate from './components/admin/news_categories/NewsCategoryCreate';
import NewsCategoryEdit from './components/admin/news_categories/NewsCategoryEdit';

const routes = [
    {
        path: '/',
        components: {
            companiesIndex: NewsCategoryIndex
        }
    },
    {path: '/admin/news-categories/create', component: NewsCategoryCreate, name: 'createNewsCategory'},
    {path: '/admin/news-categories/edit/:id', component: NewsCategoryEdit, name: 'editNewsCategory'},
];

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');