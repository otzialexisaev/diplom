<template>
    <v-select
        @change="$emit('input', $event)"
        :items="this.$store.state.const.courses"
        label="Курс"
        :value="this.$attrs.value"
        dense
    ></v-select>
</template>

<script>
export default {
    name: "CourseSelect"
}
</script>

<style scoped>

</style>
