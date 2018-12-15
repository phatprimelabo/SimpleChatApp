<template>
    <div>
        <div class="col-lg-4">
            <li class="list-group-item active">Recent Chats</li>
            <ul class="list-group">
                <recentchatpannel></recentchatpannel>
            </ul>
        </div>
        <messagepannel class="col-lg-8"></messagepannel>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import {mapActions} from 'vuex'
    export default {
        computed:{
            ...mapGetters(['rooms_id_list']),
        },
        mounted(){
            this.initChatApp();
            Echo.private('Chat-Room.RoomID-').listen('Chat', data=>{
                this.$store.commit('add_message',data);
            });
            Echo.private('Chat-Room.RoomID-').listen('Chat', data=>{
                this.$store.commit('add_message',data);
            });
        },
        watch:{
            rooms_id_list: rooms_id_list=>{
                for(let i=0; i<rooms_id_list.length;i++){
                    let room_id = rooms_id_list[i];
                    console.log(room_id);
                }
            }
        },
        methods:{
            ...mapActions(['init_getname','init_getrooms','init_listen_message']),
            async initChatApp(){
                await this.init_getname();
                await this.init_getrooms();
            }
        }
    }
</script>

<style scoped>

</style>