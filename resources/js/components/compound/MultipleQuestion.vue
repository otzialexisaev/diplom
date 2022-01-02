<template>
    <v-card elevation="15">
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
            <SubjectSelect class="mt-5" @input="subject_id = $event; updateData()"></SubjectSelect>
            <MaterialSelect @input="material_id = $event; updateData()"
                            :subject_id="this.$props.data.subject_id"></MaterialSelect>
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
    name: "MultipleQuestion",
    mixins: [QuestionsMixin],
    components: {InsertQuestion, InsertItems, SubjectSelect, MaterialSelect},
    data() {
        return {
            choiceText: '',
            descriptionInput: '',
            labelAddition: ' (несколько вариантов ответа)'
        }
    }
}
</script>

<style scoped>

</style>
