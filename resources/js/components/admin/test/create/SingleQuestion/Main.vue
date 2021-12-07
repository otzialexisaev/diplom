<template>
    <div>
        <InsertQuestion v-if="this.$props.data.description === ''" :disabled="!descriptionInput"
                        v-model="descriptionInput" @click="saveQuestionDesc"></InsertQuestion>
        <InsertItems v-else :index="this.$props.index" @addChoice="addChoice" :data="this.$props.data"
                     v-model="choiceText" :choiceText="choiceText"></InsertItems>
        <v-btn v-on:click="deleteSelf">Удалить</v-btn>
    </div>
</template>

<script>
import InsertQuestion from "./InsertQuestion";
import InsertItems from "./InsertItems";

export default {
    name: "SingleQuestion",
    components: {InsertQuestion, InsertItems},
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
