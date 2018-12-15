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
import {store} from './store/store'

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
Vue.component('room', require('./components/Room.vue'));
Vue.component('recentchatpannel', require('./components/RecentChatPannel.vue'));
Vue.component('messagepannel', require('./components/MessagePannel.vue'));
Vue.component('app', require('./components/App.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    data: {
        inuser: '',
        outuser: '',
        message: '',
        chat:{
            room_name: '',
            room_id: '',
            messages: [],
        },

        rooms: [],
    },
    created() {
        axios.get('/getname').then((response)=>{
            this.inuser = response.data.name;
        });
        axios.get('/getrooms').then((response)=>{
            this.rooms = response.data;
            console.log(this.rooms);
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
                this.$store.commit('add_message',data);
            });
    }
});
