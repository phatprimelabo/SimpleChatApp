import {routes} from "./router/router";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');


import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);

import Vue2Filters from 'vue2-filters'
Vue.use(Vue2Filters);

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/main.css'
Vue.use(ElementUI);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('account-pannel', require('./components/MyAccount.vue'));
Vue.component('search-result-panel', require('./components/SearchResultPanel.vue'));
Vue.component('search-result-item', require('./components/SearchResultItem.vue'));
Vue.component('recentchatpannel', require('./components/RecentChatPannel.vue'));
Vue.component('room', require('./components/Room.vue'));
Vue.component('messagepannel', require('./components/MessagePannel.vue'));
Vue.component('message', require('./components/Message.vue'));
Vue.component('app', require('./components/App.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




import {store} from './store/store'
import router from './router/router'
router.beforeEach((to, from, next) => {
    if(to.path!=='/' && store.state.pages_visted==0)
    next('/');
    else{
        store.state.pages_visted++;
        next();
    }
});

window.onload=function () {
    new Vue({
        el: '#app',
        store,
        router
    });
};

