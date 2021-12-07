<template>
    <v-select
        @change="$emit('input', $event);"
        :items="this.$store.state.const.questionTypes"
        item-text="desc"
        item-value="value"
        label="Выберите тип вопроса для добавления"
    ></v-select>
</template>

<script>
export default {
    name: "QuestionTypesSelect"
}
</script>

<style scoped>

</style>
