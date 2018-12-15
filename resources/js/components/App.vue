<template>
    <div>
        i'm App component
    </div>
</template>

<script>
    export default {
        mounted(){
            this.$store.commit('init_getrooms');
            this.$store.commit('init_getrooms');
            Echo.private('Chat-Room')
                .listen('Chat', (data) => {
                    this.chat.messages.push({
                        user: data.user,
                        message: data.message
                    })
                });
        }
    }
</script>

<style scoped>

</style>