<template>
    <div class="row no-gutters">
        <div class="col-lg-3">
            <account-pannel class="row"></account-pannel>
            <recentchatpannel class="col"></recentchatpannel>
        </div>
        <messagepannel class="col-lg-9"></messagepannel>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import {mapActions} from 'vuex'
    export default {
        computed:{
            ...mapGetters(['rooms_id_list']),
        },
        mounted(){
            this.initChatApp();
        },
        methods:{
            ...mapActions(['init_getname','init_getrooms','init_listen_message']),
            async initChatApp(){
                await this.init_getname();
                await this.init_getrooms();
            }
        }
    }
</script>

<style scoped>
</style>