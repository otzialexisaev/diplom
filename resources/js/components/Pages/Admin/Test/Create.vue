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
        <div v-for="(question) in this.$store.getters['adminTestCreate/questions']" :key="question.id">
            <SingleQuestion
                v-on:delete="deleteQuestion(question.id)" v-if="question.questionType === 1"
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
            questionTypeToAdd: null
        }
    },
    methods: {
        addQuestion() {
            this.$store.commit("adminTestCreate/addQuestion", {
                questionType: this.questionTypeToAdd,
                questionData: {}
            });
            // console.log(this.$store.getters["adminTestCreate/id"]);
            // console.log(this.$store.getters["adminTestCreate/questions"]);
            // this.$store.commit('adminTestCreate/addQuestion', {
            //     type: this.questionTypeToAdd,
            //     data: {
            //         text: ''
            //     }
            // });
            // this.questions.push({
            //     type: this.questionTypeToAdd,
            //     data: {
            //         check: 'asd'
            //     }
            // });
        },
        deleteQuestion(index) {
            this.$store.commit('adminTestCreate/deleteQuestion', index);
            console.log('deleting');
            console.log('index ' + index);
        }
    }
}
</script>

<style scoped>

</style>
