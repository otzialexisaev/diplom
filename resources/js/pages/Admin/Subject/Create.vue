<template>
    <div>
        <v-overlay :value="loading"></v-overlay>
        <v-text-field v-model="title" label="Наименование"></v-text-field>
        <v-btn @click="send">Сохранить</v-btn>
    </div>
</template>

<script>

export default {
    name: "Create",
    data() {
        return {
            loading: false,
            title: null,
        }
    },
    methods: {
        send() {
            if (this.title === null) {
                return;
            }
            this.loading = true;
            axios.post('/api/admin/subject/store',
                {title: this.title})
                .then((res) => {
                    this.loading = false;
                })
                .catch((data) => console.log(data));
        }
    }
}
</script>

<style scoped>

</style>
