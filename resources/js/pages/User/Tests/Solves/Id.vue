<template>
    <v-container>
        <v-card class="d-flex flex-row mb-6">
            <v-card class="flex-shrink-0" color="success" width="50" height="50"></v-card>
            <v-container class="text-center">- правильный ответ</v-container>
            <v-card class="flex-shrink-0" color="warning" width="50" height="50"></v-card>
            <v-container class="text-center">- невыбранный правильный ответ</v-container>
            <v-card class="flex-shrink-0" color="error" width="50" height="50"></v-card>
            <v-container class="text-center">- неправильный ответ</v-container>
        </v-card>
        <div class="text-h5">{{ title }}</div>
        <v-card
            v-for="(question, index) in questions"
            class="my-5"
            :key="index"
        >
            <v-card-title>{{ question.description }}</v-card-title>
            <v-card-text>
                <v-container
                    v-for="(item, index) in question.items"
                    :key="index"
                    :class="highlight(question, index)"
                >
                    {{ item }}
                </v-container>
            </v-card-text>
            <v-card-actions v-if="hasMistakes(question)">
                <v-btn @click="downloadMaterial(question.material_id)">Скачать материал</v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
export default {
    name: "Id",
    data() {
        return {
            title: '',
            questions: []
        }
    },
    methods: {
        highlight(question, index) {
            let inCorrect = question.correct.includes(index);
            let inAnswers = question.answers.includes(index);
            if (inCorrect && inAnswers) return 'success';
            if (inCorrect) return 'warning';
            if (inAnswers) return 'error';
            return '';
        },
        downloadMaterial(material_id) {
            window.location.href = '/api/materials/download/' + material_id;
        },
        hasMistakes(question) {
            let res = false;
            question.answers.forEach((answer, index) => {
                if (!question.correct.includes(answer))
                    res = true;
            });
            return res;
        }
    },
    async mounted() {
        await axios.get('/api/solves/get/' + this.$route.params.id)
            .then((res) => {
                this.$data.title = res.data.title;
                let questions = res.data.questions;
                questions.forEach((question, index) => {
                    if (!Array.isArray(question.correct)) {
                        questions[index]['correct'] = [
                            questions[index]['correct']
                        ];
                    }
                    if (!Array.isArray(question.answers)) {
                        questions[index]['answers'] = [
                            questions[index]['answers']
                        ];
                    }
                });
                this.$data.questions = questions;
            })
            .catch((res) => {
                console.log(res);
            });
    },
}
</script>

<style scoped>

</style>
