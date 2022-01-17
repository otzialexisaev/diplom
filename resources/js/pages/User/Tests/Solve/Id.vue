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
                                 :value="index"
                                 color="primary"
                        ></v-radio>
                    </v-radio-group>
                </v-container>
                <v-container v-if="question.type === 2">
                    <v-checkbox
                        v-for="(item, index) in question.data.items"
                        :key="index"
                        v-model="answers[qIndex]"
                        :value="index"
                        :label="item"
                    ></v-checkbox>
                </v-container>
            </v-card-text>
        </v-card>
        <v-btn @click="send">Отправить решение</v-btn>
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
            answers: [],
            loading: false
        }
    },
    methods: {
        send() {
            this.loading = true;
            axios.post('/api/solves/store/' + this.$route.params.id, {
                answers: this.$data.answers
            })
                .then((res) => {
                    console.log(res);
                    this.loading = false;
                    window.location.href = "/user/solves/" + res.data.id;
                })
                .catch((res) => {
                    console.log(res);
                    this.loading = false;
                });
        }
    },
    mounted() {
        this.loading = true;
        axios.get('/api/tests/get/' + this.$route.params.id)
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
