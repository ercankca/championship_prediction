<template>
    <div>
        <standingitem v-for="standing in standings" v-bind:standing="standing"></standingitem>
    </div>
</template>

<script>
    export default {
        props: ['standings'],
        mounted: function () {
            console.log("test");
        }
    }
</script>