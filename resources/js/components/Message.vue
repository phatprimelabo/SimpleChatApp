<template>
    <div class="container" v-bind:class="is_income?'text-right':'text-left'">
        <a href="#"><i v-if="!is_sameuser && !is_income" class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <p v-if="!is_sameuser" class="d-inline-block chat-title mb-2 text-muted" >{{user}}</p>
        <a href="#"><i v-if="!is_sameuser && is_income" class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <br v-if="!is_sameuser">
        <div class="row d-inline-block chat-content">{{content}}</div>
    </div>
</template>

<script>
    export default {
        props:['is_income','is_sameuser','user', 'content'],
        mounted(){
            console.log('Component Mounted');
        }
    }
</script>
<style scoped>
    .container{
        padding-right: 2rem;
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
        background-color: #DEEDF4;
    }
    .container .chat-title {
        border-radius: 3px;
    }
</style>