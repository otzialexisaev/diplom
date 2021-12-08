<template>
    <div>
        <CourseSelect v-model="course"></CourseSelect>
        <div v-for="(question, index) in questions" class="mb-10">
            <SingleQuestion
                v-if="question.type === 1"
                :index="index" :data="question.data"
                @update="updateQuestionData($event, index)"
                @delete="deleteQuestion(index)"
            ></SingleQuestion>
            <MultipleQuestion
                v-else-if="question.type === 2"
                :index="index" :data="question.data"
                @update="updateQuestionData($event, index)"
                @delete="deleteQuestion(index)"
            ></MultipleQuestion>
        </div>
        <v-divider></v-divider>
        <QuestionTypesSelect v-model="questionTypeToAdd"></QuestionTypesSelect>
        <v-btn :disabled="questionTypeToAdd === null" v-on:click="addQuestion">Добавить вопрос</v-btn>
    </div>
</template>

<script>
import SingleQuestion from "@/components/compound/SingleQuestion";
import MultipleQuestion from "@/components/compound/MultipleQuestion";
import CourseSelect from "@/components/CourseSelect";
import QuestionTypesSelect from "@/components/QuestionTypesSelect";

export default {
    name: "Create",
    components: {
        SingleQuestion,
        MultipleQuestion,
        CourseSelect,
        QuestionTypesSelect
    },
    data() {
        return {
            course: null,
            questionTypeToAdd: null,
            questions: []
            // questions: [
            //     {
            //         type: 2,
            //         data: {
            //             description: 'check multiple?',
            //             items: [
            //                 'choice 1',
            //                 'choice 2',
            //                 'choice 3'
            //             ],
            //             correctAnswer: [0, 2]
            //         }
            //     }
            // ]
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
