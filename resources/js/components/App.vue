<template>
    <div>
        <div class="col-lg-4">
            <li class="list-group-item active">Recent Chats</li>
            <ul class="list-group">
                <recentchatpannel></recentchatpannel>
            </ul>
        </div>
        <messagepannel class="col-lg-8"></messagepannel>
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