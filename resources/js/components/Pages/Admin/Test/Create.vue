<template>
    <div>
        <CourseSelect v-model="course"></CourseSelect>
        <QuestionTypesSelect v-model="questionTypeToAdd"></QuestionTypesSelect>
        <v-btn :disabled="questionTypeToAdd === null" v-on:click="addQuestion">Добавить вопрос</v-btn>
        <v-divider></v-divider>
        <div v-for="(question, index) in questions" :key="question.id">
            <SingleQuestion
                v-if="question.type === 1"
                :index="index" :data="question.data"
                @update="updateQuestionData($event, index)"
                @delete="deleteQuestion(question.id)"
            ></SingleQuestion>
            <v-divider></v-divider>
        </div>
    </div>
</template>

<script>
import SingleQuestion from "../../../admin/test/create/SingleQuestion/Main";
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
            });
        },
        deleteQuestion(index) {
            this.questions.splice(index, 1);
        },
        updateQuestionData(data, index) {
            window.Vue.set(this.questions[index], 'data', data);
        }
    }
}
</script>

<style scoped>

</style>
