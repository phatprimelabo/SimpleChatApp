<template>
    <button class="cpn-container text-left btn btn-block btn-outline-info" v-on:click="chat_this_room">
        <a href="#"><i v-if="!is_sameuser && !is_income" class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <p class="d-inline-block text-primary chat-title">{{room.name}}</p>
        <br>
        <p v-if="room.messages.length>0" class="d-inline-block chat-content text-muted">{{room.messages[room.messages.length-1].user+': '+room.messages[room.messages.length-1].message}}</p>
    </button>
</template>

<script>
    export default {
        props:['room'],
        mounted(){
            console.log('Component Mounted');
        },
        methods:{
            chat_this_room(){
                this.$store.commit('set_crr_room', this.room.id);
            }
        },
        mounted(){
            let room_id = this.room.id;
            Echo.private('Chat-Room.RoomID-'+room_id).listen('Chat', data=>{
                this.$store.commit('add_message',data);
            });
        }
    }
</script>
<style scoped>
    .cpn-container{
        padding: 15px;
    }

    .chat-content {
        margin-bottom: 4px;
        padding-left: 2rem;
        padding-right: 2rem;
        min-width: 16rem;
        border-radius: 3px;
    }
    .chat-title {
        margin-bottom: 4px;
        padding-left: 6px;
        border-radius: 3px;
    }
</style>