<template>
    <v-select
        @change="$emit('input', $event)"
        :items="this.$store.state.const.courses"
        label="Курс"
        :value="valueData"
        dense
    ></v-select>
</template>

<script>
export default {
    name: "CourseSelect",
    props: ['valuea'],
    data() {
        return {
            valueData: this.$props.valuea
        }
    }
}
</script>

<style scoped>

</style>
