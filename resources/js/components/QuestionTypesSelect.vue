<template>
    <v-card elevation="15">
        <v-card-title>Добавить вопрос</v-card-title>
        <v-card-text>
            <v-select
                @change="$emit('input', $event);"
                :items="this.$store.state.const.questionTypes"
                item-text="desc"
                item-value="value"
                label="Выберите тип вопроса для добавления"
            ></v-select>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    name: "QuestionTypesSelect"
}
</script>

<style scoped>

</style>
