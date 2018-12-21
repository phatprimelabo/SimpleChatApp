<template>
    <div class="cpn-container text-left btn btn-block" :style="is_searching? 'height: 95vh' : 'height: 24vh' ">
        <a href="#" ><i class="fas fa-user-circle fa-3x align-middle"></i></a>
        <p class="d-inline-block text-dark chat-title">{{inuser}}</p>
        <br>
        <button v-if="!is_searching" class="search-btn form-control text-left btn btn-outline-secondary" type="button" v-on:click="setSearching">
            <i class="fas fa-search "></i>
            <span>Find partner</span>
        </button>
        <div class="" v-if="is_searching">
            <div class="search-wrapper my-3">
                <div class="">
                    <input class="txtSearch" type="text" placeholder="Find By Name..." v-model="search_key"  v-on:keyup.enter="searchUser">
                    <span class="unsearch-btn float-right mr-3" v-on:click="setUnSearch"><i class="fas fa-times text-secondary icon-unsearch"></i></span>
                </div>

            </div>
        </div>
        <search-result-panel v-if="is_searching"></search-result-panel>
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters'
    import {mapGetters} from 'vuex'
    export default {
        data(){
            return {search_key: ''}
        },
        mounted(){
        },
        computed:{
            ...mapGetters(['inuser', 'is_searching']),
        },
        methods:{
            setSearching(){
                this.$store.commit('setSearching');
            },
            setUnSearch(){
                this.$store.commit('setUnSearch');
            },
            searchUser(){
                this.$store.commit('searchUser', this.search_key);
            }
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
        height: 24vh;
    }

    .search-btn
    {
        border: 1px solid #ced4da;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .search-wrapper{
        height: 60px;
        border-radius: 6px;
        background-color: #f1f1f1;
    }

    .txtSearch{
        width: 80%;
        background-color: transparent;
        border: none;
        height: 40px;
        margin-top: 8px;
        margin-left: 18px;
    }
    .txtSearch:focus {
        box-shadow: none!important;
        outline: 0;
    }
    .icon-unsearch{
        margin-top: 23px;
    }
</style>