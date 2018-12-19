import Vue from 'vue'
import Router from 'vue-router'

import App from '../components/App.vue'
import MessagePannel from '../components/MessagePannel.vue'

Vue.use(Router);

export default new Router({
    routes: [
        { path: '/', component: App,
            children:[{
                path: 'curr_chat/:roomId', name:'curr_chat', component: MessagePannel
            }]
        },
        //{ path: '/bar', component: Bar }
    ]
});