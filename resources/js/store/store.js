import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        inuser: '',
        chat:{
            room_name: '',
            room_id: '',
            messages: [],
        },
        rooms: [],
    },
    getters:{
        rooms: state => {
           return state.rooms;
        },
        chat: state => {
           return state.chat;
        },
        inuser: state => {
            return state.inuser;
        }
    },
    mutations:{
        init_getname: state => {
            axios.get('/getname').then((response)=>{
                state.inuser = response.data.name;
            });
        },
        init_getrooms: state => {
           axios.get('/getrooms').then((response)=>{
               state.rooms = response.data;
           });
       },
        send_message: (state, message) => {
            axios.post('/send',{
                message: message
            });
        },
        add_message: (state, payload) => {
            state.chat.push(payload);
        }
    }
});