<template>
    <div>
        <div v-if="this.questionText === ''">
            <v-text-field
                label="Введите вопрос"
                v-model="questionInput"
            ></v-text-field>
            <v-btn
                v-on:click="addQuestion"
            >Сохранить вопрос
            </v-btn>
        </div>
        <div v-else>
            <p>Вопрос {{ this.$props.key+ 1 }}</p>
            <p>{{ this.questionText }}</p>
            <p>Варианты ответа:</p>
            <li v-for="choice in choices">
                {{ choice }}
            </li>
            <v-text-field
                label="Введите вариант ответа"
                v-model="choiceText"
            ></v-text-field>
            <v-btn v-on:click="addChoice" :disabled="this.choiceText === ''">Добавить вариант ответа</v-btn>
        </div>
        <v-btn v-on:click="deleteSelf">Удалить</v-btn>
    </div>
</template>

<script>
export default {
    name: "SingleQuestion",
    props: ['count', 'check', 'id'],
    data() {
        return {
            choiceText: '',
            choices: [],
            questionText: '',
            questionInput: ''
        }
    },
    methods: {
        addChoice: function () {
            this.$data.choices.push(this.choiceText);
            this.$data.choiceText = '';
        },
        addQuestion: function () {
            this.questionText = this.questionInput
        },
        deleteSelf: function () {
            this.$emit('delete');
        }
    }
}
</script>

<style scoped>

</style>
