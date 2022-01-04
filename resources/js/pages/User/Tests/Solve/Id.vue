<template>
    <div>
        <div class="text-h5">{{ title }}</div>
        <v-divider></v-divider>
        <v-card class="my-5" v-for="(question, qIndex) in this.questions" :key="question.id">
            <v-card-title>{{ question.data.description }}</v-card-title>
            <v-card-text>
                <v-container v-if="question.type === 1">
                    <v-radio-group v-model="answers[qIndex]">
                        <v-radio v-for="(item, index) in question.data.items"
                                 :key="index"
                                 :label="item"
                                 :value="item"
                                 color="primary"
                        ></v-radio>
                    </v-radio-group>
                </v-container>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    name: "Id",
    data() {
        return {
            id: null,
            questions: [],
            title: '',
            answers: []
        }
    },
    mounted() {
        this.loading = true;
        axios.get('/api/tests/' + this.$route.params.id)
            .then((res) => {
                this.$data.id = res.data.id;
                this.$data.title = res.data.title;
                this.$data.questions = JSON.parse(res.data.questions);
                this.$data.questions.forEach((v, i) => {
                    this.$data.answers.push([]);
                });
            })
            .catch((res) => {
                console.log(res);
            });
    }
}
</script>
