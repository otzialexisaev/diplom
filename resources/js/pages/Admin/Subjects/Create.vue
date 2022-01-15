<template>
    <div>
        <v-overlay :value="loading"></v-overlay>
        <v-text-field v-model="title" label="Наименование"></v-text-field>
        <v-btn @click="send">Сохранить</v-btn>
        <div class="mt-5 text-h5">Список предметов:</div>
        <v-card v-for="(subject, index) in this.$store.state.const.subjects" :key="index">
            <v-card-title class="my-5">
                {{ subject.title }}
            </v-card-title>
        </v-card>
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
    async mounted() {
        await this.$store.dispatch('loadSubjects');
    },
    methods: {
        send() {
            if (this.title === null) {
                return;
            }
            this.loading = true;
            axios.post('/api/admin/subjects/store',
                {title: this.title})
                .then((res) => {
                    this.loading = false;
                    this.$store.dispatch('loadSubjects');
                })
                .catch((data) => console.log(data));
        }
    }
}
</script>

<style scoped>

</style>
