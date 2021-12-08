<template>
    <v-container fluid id="main-layout">
        <router-view></router-view>
    </v-container>
</template>

<script>
export default {
    name: "Main"
}
</script>

<style scoped>
#main-layout {
    max-width: 1000px;
}
</style>
