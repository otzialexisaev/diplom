<template>
    <div>
        <v-overlay :value="loading">
            <v-progress-circular
                indeterminate
                color="primary">
            </v-progress-circular>
        </v-overlay>
        <CourseSelect v-model="course_id"></CourseSelect>
        <GroupSelect v-if="course_id" v-bind:course_id="course_id" v-model="group_id"></GroupSelect>
        <v-text-field dense v-model="title" label="Введите наименование теста"></v-text-field>
        <div v-for="(question, index) in questions" class="mb-10">
            <SingleQuestion
                v-if="question.type === 1"
                :index="index" :data="question.data"
                @update="updateQuestionData($event, index)"
                @delete="deleteQuestion(index)"
                @materialInput="addMaterialToQuestion($event, index)"
            ></SingleQuestion>
            <MultipleQuestion
                v-else-if="question.type === 2"
                :index="index" :data="question.data"
                @update="updateQuestionData($event, index)"
                @delete="deleteQuestion(index)"
                @materialInput="addMaterialToQuestion($event, index)"
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
            // course_id: null,
            // group_id: null,
            // title: null,
            questionTypeToAdd: null,
            // questions: [],
            //////////// TESTING DATA ////////////
            course_id: 2,
            group_id: 3,
            title: 'Check title',
            questions: [
                {
                    type: 1,
                    data: {
                        description: 'check single?',
                        items: [
                            'choice 1',
                            'choice 2',
                            'choice 3'
                        ],
                        correctAnswer: 0
                    }
                },
                {
                    type: 2,
                    data: {
                        description: 'check multiple?',
                        items: [
                            'choice 2.1',
                            'choice 2.2',
                            'choice 2.3'
                        ],
                        correctAnswer: [0, 2]
                    }
                }
            ]
        }
    },
    mounted() {
        console.log('main page');
        // this.course_id = 1;
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
        addMaterialToQuestion(data, index) {
            window.Vue.set(this.questions[index], 'material', data);
        },
        save() {
            this.loading = true;
            axios.post('/api/admin/test/store', {
                title: this.title,
                group_id: this.group_id,
                questions: this.questions
            }).then((res) => {
                console.log(res);
            });
        }
    }
}
</script>

<style scoped>

</style>
