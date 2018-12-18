<template>
    <div class="col-lg-8" v-if="curr_room_stt">
        <li class="messege-panel-header list-group-item">
            <h4 class="text-secondary">{{curr_room.name}}</h4>
            <p class="text-secondary">Online</p>
        </li>
        <div class="py-3">
            <ul ref="chatcontent" class="chat-pannel w-100" v-chat-scroll="{always: false, smooth: true}" v-on:scroll="handleScroll">
                <message v-for="(item, index) in curr_room.messages" :key="index"
                         v-bind:message_data="item"
                         v-bind:is_income="item.user === inuser"
                         v-bind:is_sameuser="index===0? false: curr_room.messages[index-1].user === item.user">
                </message>
                <!--<li class="list-group-item" v-for="(item, index) in curr_room.messages" :key="index">{{item.message}}</li>-->
            </ul>
        </div>

        <div class="chat-composer input-group" >
            <div class="input-group-prepend">
                <button class="send-btn btn" type="button"><i class="far fa-grin-squint text-secondary fa-lg"></i></button>
            </div>
            <input class="chat-composer-input form-control m-0" type="text" placeholder="Compose message here..." v-model="message" v-on:keyup.enter="send">
            <div class="input-group-append">
                <button class="send-btn btn" type="button"><i class="fas fa-paper-plane text-secondary"></i></button>
            </div>
        </div>

    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        data(){
            return {
                message: '',
                scroll_Y: 0,
                height_scroll: 50,
                request_flg: 0,
            };
        },
        computed:{
            ...mapGetters(['inuser','curr_room','curr_room_stt']),
        },
        watch:{
            scroll_Y: function(scroll_Y){
                if (scroll_Y>this.height_scroll){
                    this.request_flg = 1;
                    setTimeout(()=>{

                    },300);
                }
                if (scroll_Y<this.height_scroll && this.request_flg===1){
                    this.get_newmsg();
                    this.set_scroll_after_request_more_msg();
                    this.request_flg=0;
                }
            }
        },
        methods:{
            get_newmsg(){
                this.$nextTick( function () {
                    this.$store.commit('get_newmsg',{id: this.curr_room.id, offset: this.curr_room.messages.length});
                    this.request_flg= 0;
                });
            },
            set_scroll_after_request_more_msg(){
                this.$nextTick( function () {

                });
            },
            async send(){
                await this.$store.commit('send_message', {room_id: this.curr_room.id, message: this.message});
                this.message='';
            },

            handleScroll(){
                this.$nextTick(function () {
                    this.scroll_Y = this.$refs.chatcontent.scrollTop;
                })
            }
        },
        mounted(){

        }
    }
</script>

<style scoped>
    .chat-pannel{
        overflow-y: scroll;
        height: 66vh;
        margin: 0px;
    }
    .stop-scrolling {
        height: 100%;
        overflow: hidden;
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

    .messege-panel-header{
        height: 12vh;
        border-radius: 0px;
        padding-left: 5rem;
        border-left: none;
        border-top: none;
        border-color: #f1f1f1;
        background-color: transparent;
    }

    .chat-composer
    {
        margin-right: 6px;
        margin: auto;
        height: 12vh;
        width: 68%;
    }

    .chat-composer-input
    {
        min-height: 50px;
        width: 40%;
        margin: auto;
        border: none;
        background-color: #f1f1f1;
    }

    .send-btn
    {
        height: 50px;
        min-width: 4rem ;
        padding: 0px;
        border: none;
        background-color: #f1f1f1;
    }
    .btn:focus, .btn:active, .btn:hover{
        box-shadow: none!important;
        outline: 0;
    }

    .chat-composer-input:focus
    {
        box-shadow: none!important;
        outline: 0;
    }
</style>