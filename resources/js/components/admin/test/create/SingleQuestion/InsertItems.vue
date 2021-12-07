<template>
    <div>
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
            :value="this.$props.choiceText"
            @input="$emit('input', $event);"
        ></v-text-field>
        <v-btn v-on:click="$emit('addChoice', $event)" :disabled="this.$props.choiceText === ''">Добавить вариант ответа</v-btn>
    </div>
</template>

<script>
export default {
    name: "InsertItems",
    props: ['index', 'data', 'choiceText']
}
</script>

<style scoped>

</style>
