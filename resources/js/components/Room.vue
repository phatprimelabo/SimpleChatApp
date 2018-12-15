<template>
    <button class="cpn-container text-left btn btn-block btn-outline-info" v-on:click="chat_this_room">
        <li class="list-group-item">{{room.name}}</li>
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
        padding: 0px;
    }
</style>