
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);
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
Vue.component('message', require('./components/Message.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        inuser: '',
        outuser: '',
        message: '',
        chat:{
            messages: [],
        }
    },
    created() {
        axios.get('/getname').then((response)=>{
            this.inuser = response.data.name;
        });
    },
    methods: {
        send(){
            axios.post('/send',{
                message: this.message
            }).then(()=>{
                this.message='';
            });
        }
    },
    mounted(){
        Echo.private('Chat-Room')
            .listen('Chat', (data) => {
                this.chat.messages.push({
                    user: data.user,
                    message: data.message
                })
            });
    }
});
