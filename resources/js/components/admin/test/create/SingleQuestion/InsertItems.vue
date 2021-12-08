<template>
    <div>
        <v-card-title>{{ this.$props.data.description }}</v-card-title>
        <v-card-subtitle>Вопрос {{ this.$props.index + 1 }}</v-card-subtitle>
        <v-card-text>
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
        </v-card-text>
        <v-btn v-on:click="$emit('addChoice', $event)" :disabled="this.$props.choiceText === ''">Добавить вариант
            ответа
        </v-btn>
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
