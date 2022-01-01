<template>
    <v-select
        dense
        @change="$emit('input', $event)"
        :items="subjects"
        item-text="text"
        item-value="id"
        label="Предмет"
    ></v-select>
</template>

<script>
export default {
    name: "SubjectSelect",
    computed: {
        subjects: function () {
            return this.$store.state.const.subjects;
        }
    }
}
</script>

<style scoped>

</style>
