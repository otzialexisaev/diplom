<template>
    <v-card elevation="15" >
        <InsertQuestion v-if="this.$data.description === ''"
                        v-model="descriptionInput"
                        :labelAddition="labelAddition"
                        @click="() => {this.$data.description = this.$data.descriptionInput; this.updateData()}"></InsertQuestion>
        <InsertItems v-else class="mb-5" :index="this.$props.index" @addChoice="addChoice" :data="this.$props.data"
                     v-model="choiceText" :choiceText="choiceText" :labelAddition="labelAddition"
        >
            <v-select
                multiple
                v-if="this.selectItems.length > 0"
                label="Выберите правильный ответ"
                :items="this.selectItems"
                :value="correctAnswer"
                @change="(value) => {this.correctAnswer = value; this.updateData()}"
            ></v-select>
            <v-btn v-on:click="deleteSelf">Удалить</v-btn>
        </InsertItems>
    </v-card>
</template>

<script>
import InsertQuestion from "@/components/InsertQuestion";
import InsertItems from "@/components/InsertItems";

export default {
    name: "SingleQuestion",
    components: {InsertQuestion, InsertItems},
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
            labelAddition: ' (несколько вариантов ответа)'
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
