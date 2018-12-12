<template>
    <li class="list-group-item"><slot></slot></li>
</template>

<script>
    export default {
        mounted(){
            console.log('Component Mounted');
        }
    }
</script>

<style scoped>

</style>