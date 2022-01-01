<template>
    <v-select
        @change="$emit('input', $event)"
        :items="this.$store.state.const.courses"
        label="Курс"
        :value="value"
    ></v-select>
</template>

<script>
export default {
    name: "CourseSelect",
    props: ['value'],
    data() {
        return {
            value: this.$props.value
        }
    }
}
</script>

<style scoped>

</style>
