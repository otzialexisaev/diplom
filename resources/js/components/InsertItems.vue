<template>
    <div>
        <v-card-title>{{ this.$props.data.description }}</v-card-title>
        <v-card-subtitle>{{ fullLabel }}</v-card-subtitle>
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
            <v-btn v-on:click="$emit('addChoice', $event)" :disabled="this.$props.choiceText === ''">Добавить вариант
                ответа
            </v-btn>
            <slot></slot>
        </v-card-text>
    </div>
</template>

<script>
export default {
    name: "InsertItems",
    props: ['index', 'data', 'choiceText', 'labelAddition'],
    computed: {
        fullLabel: function () {
            if (this.$props.labelAddition) {
                return 'Вопрос ' + (this.$props.index + 1) + ' ' + this.$props.labelAddition
            } else {
                return `Вопрос ` + (this.$props.index + 1)
            }
        }
    }
}
</script>

<style scoped>

</style>
