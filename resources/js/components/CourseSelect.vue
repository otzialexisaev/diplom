<template>
    <v-select
        @change="$emit('input', $event)"
        :items="this.$store.state.const.courses"
        item-text="text"
        item-value="value"
        label="Курс"
    ></v-select>
</template>

<script>
export default {
    name: "CourseSelect",
}
</script>

<style scoped>

</style>
