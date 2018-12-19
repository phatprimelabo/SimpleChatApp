<template>
    <div class="col">
        <h2>Welcome!</h2>
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
            ...mapGetters(['inuser']),
            curr_room() {
               return this.$store.getters.curr_room(this.$route.params.roomId);
            }
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
            async send(){
                await this.$store.commit('send_message', {room_id: this.curr_room.id, message: this.message});
                this.message='';
            },

            handleScroll(){
                this.$nextTick(function () {
                    this.scroll_Y = this.$refs.chatcontent.scrollTop;
                })
            },
            async fetch_room(){
            }
        },
        mounted(){

        },
        beforeMount(){
        },
        created(){

        },
        updated(){

        }
    }
</script>

<style scoped>
    .chat-pannel{
        overflow-y: scroll;
        height: 70vh;
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
        height: 10vh;
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