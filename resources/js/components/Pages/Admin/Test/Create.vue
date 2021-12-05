<template>
    <div>
        <v-btn v-on:click="check">aeqwfв</v-btn>
        <p v-for="question in questions">{{ question.type }}</p>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            questions: [
                {
                    type: 'aaa',
                    data: [

                    ]
                }
            ]
        }
    },
    methods: {
        check() {
            console.log(this.$data.questions);
            console.log(this.$data.questions.push({data: [], type: 'bbb'}));
            console.log(this.$data.questions);
        }
    }
}
</script>

<style scoped>

</style>
