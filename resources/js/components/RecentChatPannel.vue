<template>
    <div>
        <room v-for="room in rooms" v-bind:name="room.name"></room>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        computed: {
            ...mapGetters(['rooms'])
        }
    }
</script>

<style scoped>

</style>