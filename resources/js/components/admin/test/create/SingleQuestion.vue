<template>
    <div>
        <div v-if="this.$props.data.description === ''">
            <v-text-field
                label="Введите вопрос"
                v-model="descriptionInput"
            ></v-text-field>
            <v-btn
                v-on:click="saveQuestionDesc"
                :disabled="!descriptionInput"
            >Сохранить вопрос
            </v-btn>
        </div>
        <div v-else>
            <p>Вопрос {{ this.$props.index + 1 }}</p>
            <p>{{ this.$props.data.description }}</p>
            <p>Варианты ответа:</p>
            <ul>
                <li v-for="item in this.$props.data.items">
                    {{ item }}
                </li>
            </ul>
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
    props: ['data', 'index'],
    data() {
        return {
            choiceText: '',
            descriptionInput: ''
        }
    },
    mounted: function () {
        window.Vue.set(this.$props.data, 'items', []);
        window.Vue.set(this.$props.data, 'description', '');
    },
    methods: {
        addChoice: function () {
            this.$props.data.items.push(this.choiceText);
            this.choiceText = '';
        },
        saveQuestionDesc: function () {
            this.$props.data.description = this.descriptionInput;
        },
        deleteSelf: function () {
            this.$emit('delete', this.$props.index);
        }
    }
}
</script>

<style scoped>

</style>
