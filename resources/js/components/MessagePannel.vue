<template>
    <div class="col-lg-8" v-if="curr_room_stt">
        <li class="list-group-item active"> {{curr_room.name}}</li>
        <ul class="list-group chat-pannel p-2" v-chat-scroll>
            <message v-for="(item, index) in curr_room.messages" :key="index"
                     v-bind:msg_data="{
                         is_income: item.user==inuser,
                         is_sameuser: index>0? curr_room.messages[index-1].user==item.user : false,
                         user: item.user,
                         content: item.message
                     }" >
            </message>
        </ul>
        <input style="width: 100%" type="text" class="list-group-item" placeholder="Compose message" v-model="message" v-on:keyup.enter="send">
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        data(){
            return {
                message: ''
            };
        },
        computed:{
            ...mapGetters(['inuser','curr_room','curr_room_stt'])
        },
        methods:{
            async send(){
                await this.$store.commit('send_message', {room_id: this.curr_room.id, message: this.message});
                this.message='';
            }
        },
        mounted(){
        }
    }
</script>

<style scoped>
    .chat-pannel{
        overflow-y: scroll;
        height: 400px;
    }
    .chat-pannel::-webkit-scrollbar-track
    {

        background-color: white;
    }

    .chat-pannel::-webkit-scrollbar
    {
        width: 6px;
        background-color: #007bff;
    }

    .chat-pannel::-webkit-scrollbar-thumb
    {
        background-color: #007bff;
    }
</style>