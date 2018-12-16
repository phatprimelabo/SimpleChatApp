<template>
    <div>
        <room v-for="room in orderBy(rooms, 'idx')" :key="room.idx" v-bind:room="room"></room>
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

</style>