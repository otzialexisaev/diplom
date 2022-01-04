<template>
    <v-container v-for="">
        <v-card>

        </v-card>
    </v-container>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            items: [],
            loading: false,
        }
    },
    mounted() {
        this.loading = true;
        axios.get('/api/test/index');
    }
}
</script>

<style scoped>

</style>
