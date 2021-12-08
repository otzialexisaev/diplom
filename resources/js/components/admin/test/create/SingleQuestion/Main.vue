<template>
    <div>
        <InsertQuestion v-if="this.$props.data.description === ''" :disabled="!descriptionInput"
                        v-model="descriptionInput" @click="updateData"></InsertQuestion>
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
    props: {
        data: {
            type: Object,
            default: function () {
                return {
                    items: [],
                    description: ''
                }
            }
        },
        index: Number
    },
    data() {
        return {
            choiceText: '',
            descriptionInput: '',
            items: this.$props.data.items
        }
    },
    methods: {
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
                description: this.$data.descriptionInput
            });
        }
    }
}
</script>

<style scoped>

</style>
