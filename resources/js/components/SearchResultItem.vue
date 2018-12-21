<template>
    <div class="cpn-container text-left btn btn-block">
        <a href="#"><i class="d-inline-block fas fa-user-circle fa-lg"></i></a>
        <p class="d-inline-block text-dark chat-title">{{item.name}}</p>
        <span class="d-inline-flex float-right badge badge-primary">New</span>
    </div>
</template>

<script>
    export default {
        props: ['item'],
        methods:{

        },
        mounted(){
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

    .chat-content {
        margin-bottom: 4px;
        padding-left: 2rem;
        padding-right: 2rem;
        min-width: 16rem;
        border-radius: 3px;
    }
    .chat-title {
        margin-bottom: 4px;
        padding-left: 6px;
        border-radius: 3px;
    }
</style>