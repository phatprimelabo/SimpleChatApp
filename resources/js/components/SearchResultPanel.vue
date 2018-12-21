<template>
    <div class="recent-chat" >
        <li class="header-recent-chat list-group-item">Search Results</li>
        <ul class="list-recent-chat list-group">
            <search-result-item v-for="item in search_result"
                                :item="item">
            </search-result-item>
        </ul>
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters'
    import {mapGetters} from 'vuex'
    export default {
        mixins: [Vue2Filters.mixin],
        computed: {
            ...mapGetters(['search_result']),
        },
        watch:{

        },
    }
</script>

<style scoped>
.recent-chat
{
    padding: 0px;
}

.header-recent-chat
{
    border:none;
    height: 8vh;
    background-color: #f1f1f1;
}

.list-group{
    height: 62vh;
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



.list-group-item
{
    border-radius: 0px;
}

</style>