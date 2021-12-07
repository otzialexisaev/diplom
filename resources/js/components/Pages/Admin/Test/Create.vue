<template>
    <div>
        <CourseSelect v-model="course"></CourseSelect>
        <QuestionTypesSelect v-model="questionTypeToAdd"></QuestionTypesSelect>
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
import CourseSelect from "../../../CourseSelect";
import QuestionTypesSelect from "../../../QuestionTypesSelect";

export default {
    name: "Create",
    components: {
        SingleQuestion,
        CourseSelect,
        QuestionTypesSelect
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
