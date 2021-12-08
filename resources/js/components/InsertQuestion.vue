<template>
    <v-card-text>
        <v-text-field
            :label="fullLabel"
            @input="$emit('input', $event);"
        ></v-text-field>
        <v-btn
            v-on:click="$emit('click', $event)"
            :disabled="this.$props.disabled"
        >Сохранить вопрос
        </v-btn>
    </v-card-text>
</template>

<script>
export default {
    name: "InsertQuestion",
    props: ['disabled', 'labelAddition'],
    computed: {
        fullLabel: function () {
            if (this.$props.labelAddition) {
                return 'Введите вопрос ' + this.$props.labelAddition
            } else {
                return 'Введите вопрос'
            }
        }
    }
}
</script>

<style scoped>

</style>
