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
                :value="correct"
                @change="(value) => {this.correct = value; this.updateData()}"
            ></v-select>
            <v-btn v-on:click="deleteSelf">Удалить</v-btn>
            <MaterialSelect @input="material_id = $event; updateData()"
                            :value="material_id"
                            class="mt-5"
                            :subject_id="this.$props.subject_id"></MaterialSelect>
        </InsertItems>
    </v-card>
</template>

<script>
import InsertQuestion from "@/components/InsertQuestion";
import InsertItems from "@/components/InsertItems";
import SubjectSelect from "@/components/SubjectSelect";
import MaterialSelect from "@/components/MaterialSelect";
import QuestionsMixin from "@/mixins/QuestionsMixin";

export default {
    name: "SingleQuestion",
    components: {InsertQuestion, InsertItems, SubjectSelect, MaterialSelect},
    mixins: [QuestionsMixin],
    data() {
        return {
            choiceText: '',
            descriptionInput: '',
            labelAddition: ' (один вариант ответа)'
        }
    }
}
</script>

<style scoped>

</style>
