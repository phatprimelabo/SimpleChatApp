import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        inuser: '',
        messages: [], //{room_id: , user: , message}
        curr_room_stt: false,
        curr_room: null,
        rooms: [],  //{(DB)id: ,DBname , messages:{user: , message: }}
    },
    getters:{
        rooms: state => {
           return state.rooms;
        },
        inuser: state => {
            return state.inuser;
        },
        curr_room: state => {
            return state.rooms.find(room=>room.id == state.curr_room);
        },
        curr_room_stt: state => {
            return state.curr_room_stt;
        },
        messages: state => {
            return state.messages;
        },
        rooms_id_list: state => {
            return state.rooms.map(room => room.id);
        }
    },
    mutations:{
        // INITIAL
        init_getname: state => {
            axios.get('/getname').then((response)=>{
                state.inuser = response.data.name;
                console.log(state.inuser);
            });
        },
        init_getrooms: state => {
           axios.get('/getrooms').then((response)=>{
               state.rooms = response.data;
           });
       },


        //SET CRR CHAT ROOM STT
        set_crr_room: (state, id) => {
            state.curr_room_stt = true;
            state.curr_room = id;
        },


        //CHAT TASK
        send_message: (state, payload) => {    //payload    {room_id: ,message:}
                axios.post('/send', payload);
        },
        add_message: (state, payload) => {
            state.messages.push(payload);               //Asynchronus problem here
            state.rooms.find(room=>room.id == payload.room_id).messages.push(payload);
        },

        //listern message
        init_listen_message: state => {
            state.rooms.forEach(room=>{
                console.log(room)
                Echo.private(`Chat-Room.RoomID-`+room.id)
                    .listen('Chat', (data) => {
                        commit('add_message',data);
                    });
            })
        }
    },
    actions:{
        init_getname: ({commit})=>{
            commit('init_getname');
        },
        init_getrooms: ({commit})=>{
            commit('init_getrooms');
        },
        init_listenChatApp: async ({commit})=>{
            await commit('init_getname');
            await commit('init_getrooms');
            commit('init_listen_message');
        }
    }
});