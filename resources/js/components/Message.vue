<template>
    <div class="container" v-bind:class="is_income?'text-right':'text-left'">
        <p v-if="!is_sameuser" class="row d-inline-block chat-title mb-2">{{user}}</p><br>
        <div class="row d-inline-block chat-content"><slot></slot></div>
    </div>
</template>

<script>
    export default {
        props:['is_income','is_sameuser','user'],
        mounted(){
            console.log('Component Mounted');
        }
    }
</script>
<style scoped>
    .container{
        margin-top: 1rem;
        margin-right: 2rem;
        margin-bottom: 1rem;
        padding-top: 0.6rem;
        padding-right: 2rem;
        border: none;
    }
    .container .chat-content {
        padding-left: 1rem;
        padding-right: 1rem;
        min-width: 4rem;
        border-radius: 3px;
        background-color: #DEEDF4;
    }
    .container .chat-title {
        border-radius: 3px;
    }
</style>