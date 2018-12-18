import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        inuser: '',
        messages: [], //{room_id: , user: , message}
        curr_room_stt: false,
        curr_room: null,
        rooms_render: true,
        rooms_string:'',
        rooms: [],  //{(DB)id: ,idx, DBname , messages:{user: , message: }}
    },
    getters:{
        rooms: state => {
            let seft = state.rooms;
            seft.forEach((room,index)=>{ seft[index].idx = index });
            return seft;
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
        },
        rooms_string: state => {
            let seft = state.rooms;
            state.rooms.forEach((room,index)=>{ seft[index].idx = index });
            return state.rooms.map(room => room.name+room.idx).join();
        },
        rooms_render: state => {
            return state.rooms_render;
        }
    },
    mutations:{
        // INITIAL
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

        //SET CRR CHAT ROOM STT
        set_crr_room: (state, id) => {
            state.curr_room_stt = true;
            state.curr_room = id;
            axios.post('/set_curr_chat_room/'+id).then(()=>{
                state.rooms.find(room => room.id==id).is_read=1;
            });
        },

        //CHAT TASK
        send_message: (state, payload) => {    //payload    {room_id: ,message:}
                axios.post('/send', payload);
        },
        add_message: (state, payload) => {
            state.messages.push(payload);               //Asynchronus problem here
            let room_index = state.rooms.findIndex(room=>room.id == payload.room_id);
            let room = state.rooms[room_index];
            room.messages.push(payload);
            if(payload.user != state.inuser){
                room.is_read = 0;
            }

            // THIS FOR STATE-STORE REACTIVITY reObject-assign
            let rooms = [...state.rooms];
            let temp_room = rooms.splice(room_index,1)[0];
            rooms.unshift(temp_room);
            rooms.forEach((room,index)=>room.idx=index);
            state.rooms = [...rooms];
        },
        get_newmsg: (state, payload)=>{
            //console.log('test');
            axios.get('/get_curr_room/'+payload.id+'/'+payload.offset)
                .then((data)=>{
                    state.rooms.find(room=>room.id===payload.id)[0] = [...data];
                });
        },

        //listern message
        init_listen_message: state => {
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