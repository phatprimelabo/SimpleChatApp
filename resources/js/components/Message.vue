<template>
    <div class="container" v-bind:class="message_data.is_income?'text-right':'text-left'">
        <a href="#"><i v-if="!message_data.is_sameuser && !message_data.is_income" class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <p v-if="!message_data.is_sameuser" class="d-inline-block chat-title mb-2 text-muted" >{{message_data.user}}</p>
        <a href="#"><i v-if="!message_data.is_sameuser && message_data.is_income" class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <br v-if="!message_data.is_sameuser">
        <div class="row d-inline-block chat-content">{{message_data.content}}</div>
    </div>
</template>

<script>
    export default {
        props:['msg_data'],
        data:()=>{
            return {message_data:{} }
        },
        mounted(){
            this.message_data = _.clone(this.msg_data);
        }
    }
</script>
<style scoped>
    .container{
        border: none;
    }
    .container .chat-content {
        margin-bottom: 3px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 2rem;
        padding-right: 2rem;
        min-width: 16rem;
        border-radius: 3px;
        background-color: #F1F1F1;
    }
    .container .chat-title {
        border-radius: 3px;
    }
</style>