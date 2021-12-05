<template>
    <div>
        <v-btn v-on:click="check">aeqwfв</v-btn>
        <v-select
            v-model="course"
            :items="this.$store.state.const.courses"
            item-text="text"
            item-value="value"
            label="Курс"
        ></v-select>
        <p v-for="question in questions">{{ question.type }}</p>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            course: null,
            questions: [
                {
                    type: 'aaa',
                    data: []
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
