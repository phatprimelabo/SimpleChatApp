<template>
    <div class="cpn-container text-left btn btn-block" v-on:click="chat_this_room">
        <a href="#"><i class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <p class="d-inline-block text-dark chat-title">{{room.name}}</p>
        <span v-if="!room.is_read" class="d-inline-flex float-right badge badge-primary">New</span>
        <br>
        <p v-if="room.messages.length>0"
           class="d-inline-block chat-content"
           v-bind:class="room.is_read?'text-muted':'text-dark font-weight-bold'">
            {{room.messages[room.messages.length-1].message}}
        </p>
    </div>
</template>

<script>
    export default {
        props: ['room'],
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
        margin: 0px;
        border-radius: 0px;
        padding: 15px;
        border-top: none;
        border-color: #f1f1f1;
        min-height: 5rem;
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