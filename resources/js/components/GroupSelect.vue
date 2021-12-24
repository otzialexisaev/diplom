<template>
    <v-select
        @change="$emit('input', $event)"
        :items="groups"
        item-text="text"
        item-value="id"
        label="Группа"
    ></v-select>
</template>

<script>
export default {
    name: "CourseSelect",
    props: ['course'],
    computed: {
        groups: function () {
            return this.$store.state.const.groups[this.$props.course];
        }
    }
}
</script>

<style scoped>

</style>
