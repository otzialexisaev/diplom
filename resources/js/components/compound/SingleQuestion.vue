<template>
    <v-card elevation="15">
        <InsertQuestion v-if="this.$data.description === ''"
                        :labelAddition="labelAddition"
                        v-model="descriptionInput"
                        @click="() => {this.$data.description = this.$data.descriptionInput; this.updateData()}"></InsertQuestion>
        <InsertItems v-else class="mb-5" :index="this.$props.index" @addChoice="addChoice" :data="this.$props.data"
                     v-model="choiceText" :choiceText="choiceText" :labelAddition="labelAddition"
        >
            <v-select
                v-if="this.selectItems.length > 0"
                label="Выберите правильный ответ"
                :items="this.selectItems"
                :value="correctAnswer"
                @change="(value) => {this.correctAnswer = value; this.updateData()}"
            ></v-select>
            <v-btn v-on:click="deleteSelf">Удалить</v-btn>
            <SubjectSelect class="mt-5" @input="$emit('subjectInput', $event)"></SubjectSelect>
            <MaterialSelect @input="$emit('materialInput', $event)" :subject_id="this.$props.subject_id"></MaterialSelect>
        </InsertItems>
    </v-card>
</template>

<script>
import InsertQuestion from "@/components/InsertQuestion";
import InsertItems from "@/components/InsertItems";
import SubjectSelect from "@/components/SubjectSelect";
import MaterialSelect from "@/components/MaterialSelect";

export default {
    name: "SingleQuestion",
    components: {InsertQuestion, InsertItems, SubjectSelect, MaterialSelect},
    props: {
        data: {
            type: Object,
            default: function () {
                return {
                    items: [],
                    description: '',
                    correctAnswer: null
                }
            }
        },
        subject_id: {
            default: null
        },
        index: Number
    },
    computed: {
        selectItems: function () {
            let items = [];
            this.$data.items.forEach((value, index) => {
                items.push({text: value, value: index});
            });
            return items;
        }
    },
    data() {
        return {
            choiceText: '',
            descriptionInput: '',
            description: this.$props.data.description,
            correctAnswer: this.$props.data.correctAnswer,
            items: this.$props.data.items,
            labelAddition: ' (один вариант ответа)'
        }
    },
    methods: {
        correctAnswerIndex: function (checkValue) {
            let toReturn = null;
            this.items.forEach((value, index) => {
                if (value === checkValue) {
                    toReturn = index;
                }
            });
            this.correctAnswer = toReturn;
            this.updateData();
        },
        addChoice: function () {
            this.$data.items.push(this.choiceText);
            this.choiceText = '';
            this.updateData();
        },
        deleteSelf: function () {
            this.$emit('delete');
        },
        updateData: function () {
            this.$emit('update', {
                items: this.$data.items,
                description: this.$data.description,
                correctAnswer: this.correctAnswer
            });
        }
    }
}
</script>

<style scoped>

</style>
