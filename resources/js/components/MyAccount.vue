<template>
    <div class="cpn-container text-left btn btn-block">
        <a href="#" ><i class="fas fa-user-circle fa-3x align-middle"></i></a>
        <p class="d-inline-block text-dark chat-title">{{inuser}}</p>
        <br>
        <button class="search-btn form-control text-left btn btn-outline-secondary" type="button">
            <i class="fas fa-search "></i>
            <span>Find partner</span>
        </button>
        <!--<div class="">
            <div class="input-group my-3">
                <input class="form-control" type="text" placeholder="Find By Name...">
                <div class="input-group-append">
                    <button class="search-btn btn btn-outline-secondary" type="button"><i class="fas fa-search text-light"></i></button>
                </div>
            </div>
        </div>-->
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters'
    import {mapGetters} from 'vuex'
    export default {
        mounted(){
        },
        computed:{
            ...mapGetters(['inuser']),
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
        margin: 0px;
        border-radius: 0px;
        padding: 15px;
        border-top: none;
        border-color: #f1f1f1;
        min-height: 5rem;
    }

    .search-btn
    {
        border: 1px solid #ced4da;
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>