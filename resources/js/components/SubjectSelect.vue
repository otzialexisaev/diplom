<template>
    <v-select
        dense
        @change="$emit('input', $event)"
        :items="subjects"
        item-text="title"
        item-value="id"
        label="Предмет"
        :value="this.$attrs.value"
    ></v-select>
</template>

<script>
export default {
    name: "SubjectSelect",
    computed: {
        subjects: function () {
            return this.$store.state.const.subjects;
        }
    },
    mounted() {
        this.$store.dispatch('loadSubjects');
    }
}
</script>

<style scoped>

</style>
