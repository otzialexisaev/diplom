<template>
    <div>
        <v-container v-for="(item) in this.items" :key="item.id">
            <v-card :href="'/admin/test/' + item.id">
                <v-card-title>{{ item.title }}</v-card-title>
                <v-card-text>Группа: {{ item.group.title }}; Курс {{ item.group.course }}</v-card-text>
            </v-card>
        </v-container>
    </div>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            items: []
        }
    },
    mounted() {
        axios.get('/api/admin/test/index')
            .then((res) => {
                this.$data.items = res.data;
                console.log(res.data);
            })
            .catch((res) => {
                console.log(res.data);
            });
    }
}
</script>

<style scoped>

</style>
