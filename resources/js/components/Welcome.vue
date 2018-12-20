<template >
    <div class="row align-items-center">
        <div class="col">
            <h1 class="text-center">Welcome to my chat application</h1>
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
    .row{
        height: 100%;
    }
</style>