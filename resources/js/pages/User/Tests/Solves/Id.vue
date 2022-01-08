<template>
    <v-container>

    </v-container>
</template>

<script>
export default {
    name: "Id",
    async mounted() {
        await axios.get('/api/tests/solves/' + this.$route.params.id)
            .then((res) => {
                console.log(res);
            })
            .catch((res) => {
                console.log(res);
            });
    },
}
</script>

<style scoped>

</style>
