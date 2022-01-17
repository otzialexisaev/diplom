<template>
    <div>
        <v-container v-for="item in items" :key="item.id">
            <v-card :href="'/user/tests/solve/' + item.id">
                <v-card-title>{{ item.title }}</v-card-title>
                <v-card-subtitle>Предмет: {{ item.subject.title }}</v-card-subtitle>
                <v-card-actions v-if="item.has_solves">
                    <v-btn @click.prevent="goToSolves(item.id)">Просмотреть последнее решение</v-btn>
                </v-card-actions>
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
    methods: {
        goToSolves(testId) {
            axios.get('/api/solves/findByTestId/' + testId)
                .then((res) => {
                    window.location.href = '/user/solves/' + res.data;
                })
                .catch((res) => {
                    console.log(res);
                });
        }
    },
    mounted() {
        this.loading = true;
        axios.get('/api/tests/getAll')
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
