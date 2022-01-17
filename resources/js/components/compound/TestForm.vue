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
        <SubjectSelect class="mt-5" v-model="subject_id"></SubjectSelect>
        <div v-for="(question, index) in questions" class="mb-10">
            <SingleQuestion
                v-if="question.type === 1"
                :index="index" :data="question.data"
                :subject_id="subject_id"
                @update="updateQuestionData($event, index)"
                @delete="deleteQuestion(index)"
                @materialInput="addMaterialToQuestion($event, index)"
            ></SingleQuestion>
            <MultipleQuestion
                v-else-if="question.type === 2"
                :index="index" :data="question.data"
                :subject_id="subject_id"
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
import SubjectSelect from "../SubjectSelect";

export default {
    name: "TestForm",
    components: {
        SubjectSelect,
        SingleQuestion,
        MultipleQuestion,
        CourseSelect,
        GroupSelect,
        QuestionTypesSelect
    },
    data() {
        return {
            loading: false,
            course_id: null,
            group_id: null,
            title: null,
            questionTypeToAdd: null,
            subject_id: null,
            questions: [],
            //////////// TESTING DATA ////////////
            // course_id: 2,
            // group_id: 3,
            // title: 'Check title',
            // questions: [
            //     {
            //         type: 1,
            //         data: {
            //             description: 'check single?',
            //             items: [
            //                 'choice 1',
            //                 'choice 2',
            //                 'choice 3'
            //             ],
            //             correct: 0
            //         }
            //     },
            //     {
            //         type: 2,
            //         data: {
            //             description: 'check multiple?',
            //             items: [
            //                 'choice 2.1',
            //                 'choice 2.2',
            //                 'choice 2.3'
            //             ],
            //             correct: [0, 2]
            //         }
            //     }
            // ]
        }
    },
    props: ['id'],
    async mounted() {
        await this.$store.dispatch('loadGroups');
        if (this.$props.id === undefined) {
            return;
        }
        this.loading = true;
        axios.get('/api/admin/tests/get/' + this.$props.id)
            .then((res) => {
                this.group_id = res.data.group_id;
                this.course_id = res.data.group.course;
                this.questions = JSON.parse(res.data.questions)
                this.title = res.data.title;
                this.subject_id = res.data.subject_id;
                this.loading = false;
            })
            .catch(res => console.log(res));
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
            let url = '/api/admin/tests/store';
            if (this.$props.id !== undefined) {
                url = '/api/admin/tests/update/' + this.$props.id;
            }
            axios.post(url, {
                title: this.title,
                group_id: this.group_id,
                subject_id: this.subject_id,
                questions: this.questions
            }).then((res) => {
                window.location.href = "/admin/tests/" + res.data.id;
            });
        }
    }
}
</script>

<style scoped>

</style>
