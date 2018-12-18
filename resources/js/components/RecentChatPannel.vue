<template>
    <div class="recent-chat" >
        <li class="header-recent-chat list-group-item">Recent Chats</li>
        <ul class="list-recent-chat list-group">
            <room v-for="room in orderBy(rooms, 'idx')" :key="room.idx" v-bind:room="room"></room>
        </ul>
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters'
    import {mapGetters} from 'vuex'
    export default {
        mixins: [Vue2Filters.mixin],
        computed: {
            ...mapGetters(['rooms','rooms_string','rooms_render']),
        },
        watch:{
        }
    }
</script>

<style scoped>
.recent-chat
{
    padding: 0px;
}
.list-group{
    height: 60vh;
    width: 100%;
    overflow-x: hidden;
    overflow-y: scroll;
    background-color: #f9f9f9;
}

.list-group::-webkit-scrollbar-track
{

    background-color: #f1f1f1;
}

.list-group::-webkit-scrollbar
{
    width: 6px;
    background-color: #007bff;
    border-radius: 10px;
    height: 30px;
}

.list-group::-webkit-scrollbar-thumb
{
    background-color: #cfcfcf;
    border-radius: 10px;
    height: 30px;
}

.header-recent-chat
{
    border:none;
    height: 8vh;
    background-color: #f1f1f1;
}

.list-group-item
{
    border-radius: 0px;
}

</style>