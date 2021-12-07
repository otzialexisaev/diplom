<template>
    <div>
        <v-select
            v-model="course"
            :items="this.$store.state.const.courses"
            item-text="text"
            item-value="value"
            label="Курс"
        ></v-select>
        <v-select
            v-model="questionTypeToAdd"
            :items="this.$store.state.const.questionTypes"
            item-text="desc"
            item-value="value"
            label="Выберите тип вопроса для добавления"
        ></v-select>
        <v-btn :disabled="questionTypeToAdd === null" v-on:click="addQuestion">Добавить вопрос</v-btn>
        <v-divider></v-divider>
        <div v-for="(question, index) in questions" :key="question.id">
            <SingleQuestion
                :index="index"
                :data="question.data"
                v-on:delete="deleteQuestion(question.id)" v-if="question.type === 1"
            ></SingleQuestion>
            <v-divider></v-divider>
        </div>
    </div>
</template>

<script>
import SingleQuestion from "../../../admin/test/create/SingleQuestion";

export default {
    name: "Create",
    components: {
        SingleQuestion
    },
    data() {
        return {
            course: null,
            questionTypeToAdd: null,
            questions: []
        }
    },
    methods: {
        addQuestion() {
            this.questions.push({
                type: this.questionTypeToAdd,
                data: {}
            });
        },
        deleteQuestion(index) {
            this.questions.splice(index, 1);
        }
    }
}
</script>

<style scoped>

</style>
