<template>
    <button class="cpn-container text-left btn btn-block btn-outline-info" v-on:click="chat_this_room">
        <li class="list-group-item">{{name}}</li>
    </button>
</template>

<script>
    export default {
        props:['name'],
        mounted(){
            console.log('Component Mounted');
        },
        methods:{
            chat_this_room(){
                console.log('this chat will be mounted');
            }
        }

    }
</script>
<style scoped>
    .cpn-container{
        padding: 0px;
    }
</style>