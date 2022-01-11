<template>
    <div>
        <v-container v-for="item in items" :key="item.id">
            <v-card :href="'/user/tests/solve/' + item.id">
                <v-card-title>{{ item.title }}</v-card-title>
                <v-card-subtitle>Предмет: {{item.subject.title}}</v-card-subtitle>
            </v-card>
        </v-container>
    </div>
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
        axios.get('/api/tests/index')
            .then((res) => {
                this.$data.items = res.data;
            })
            .catch((res) => {
                console.log(res)
            });
    }
}
</script>

<style scoped>

</style>
