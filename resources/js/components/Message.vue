<template>
    <div class="">
        <div class="list-group-item " v-bind:class="!is_income?'text-left':'text-right'"><slot></slot></div>
        <small class="badge badge-primary mb-2" v-bind:class="!is_income?'float-left':'float-right'">{{user}}</small>
    </div>
</template>

<script>
    export default {
        props:['is_income','user'],
        mounted(){
            console.log('Component Mounted');
        }
    }
</script>
<style scoped>
</style>