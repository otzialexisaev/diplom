<template>
    <div>
        <v-overlay :value="loading">
            <v-progress-circular
                indeterminate
                color="primary">
            </v-progress-circular>
        </v-overlay>
        <CourseSelect v-model="course"></CourseSelect>
        <GroupSelect v-if="course" v-bind:course="course" v-model="group"></GroupSelect>
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
        <QuestionTypesSelect class="mb-10" v-model="questionTypeToAdd"></QuestionTypesSelect>
        <v-btn class="mr-10" :disabled="questionTypeToAdd === null" v-on:click="addQuestion">Добавить вопрос</v-btn>
        <v-btn v-on:click="save">Сохранить</v-btn>
    </div>
</template>

<script>
import SingleQuestion from "@/components/compound/SingleQuestion";
import MultipleQuestion from "@/components/compound/MultipleQuestion";
import CourseSelect from "@/components/CourseSelect";
import GroupSelect from "@/components/GroupSelect";
import QuestionTypesSelect from "@/components/QuestionTypesSelect";

export default {
    name: "Create",
    components: {
        SingleQuestion,
        MultipleQuestion,
        CourseSelect,
        GroupSelect,
        QuestionTypesSelect
    },
    data() {
        return {
            loading: false,
            course: null,
            group: null,
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
        },
        save() {
            this.loading = true;
            axios.post('/api/admin/test/store', this.$data).then((res) => {
                console.log(res);
            });
        }
    }
}
</script>

<style scoped>

</style>
