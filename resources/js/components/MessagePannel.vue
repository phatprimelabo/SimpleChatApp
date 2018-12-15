<template>
    <div class="col-lg-8">
        <li class="list-group-item active">Current Chat</li>
        <ul class="list-group chat-pannel p-2" v-chat-scroll >
            <message v-for="(message, index) in chat.messages"
                     v-bind:is_income="message.user==inuser"
                     v-bind:is_sameuser="index>0?chat.messages[index-1].user==message.user:false"
                     v-bind:user="message.user"
                     v-bind:content="message.message">
            </message>
        </ul>
        <input style="width: 100%" type="text" class="list-group-item" placeholder="Compose message" v-model="message" v-on:keyup.enter="send">
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        data:{
          message:'',
        },
        computed:{
            ...mapGetters(['inuser','chat'])
        },
        methods:{
            async send(){
                await this.$store.commit('send_message',this.message);
                this.message='';
            }
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