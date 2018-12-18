<template>
    <div class="container" v-bind:class="is_income?'text-right':'text-left'">
        <a href="#"><i v-if="!is_sameuser && !is_income" class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <p v-if="!is_sameuser" class="d-inline-block chat-title mb-2 text-muted" >{{message_data.user}}</p>
        <a href="#"><i v-if="!is_sameuser && is_income" class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <br v-if="!is_sameuser">
        <div class="row d-inline-block chat-content">{{message_data.message}}</div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        props:['message_data','is_income', 'is_sameuser'],
        computed:{
              //...mapGetters(['inuser'])
        },
        mounted(){
            //this.message_data = _.clone(this.msg_data);
            //this.is_income = this.message_data.user == this.inuser;
        }
    }
</script>
<style scoped>
    .container{
        border: none;
        width: 68%;
        padding: 0px;
    }
    .container .chat-content {
        margin-bottom: 5px;
        margin-right: 0px;
        margin-left: 0px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
        min-width: 5rem;
        border-radius: 8px;
        background-color: #F1F1F1;
    }
    .container .chat-title {
        border-radius: 3px;
    }
</style>