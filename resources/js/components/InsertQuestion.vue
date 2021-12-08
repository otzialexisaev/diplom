<template>
    <v-card-text>
        <v-text-field
            label="Введите вопрос"
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
    props: ['disabled']
}
</script>

<style scoped>

</style>
