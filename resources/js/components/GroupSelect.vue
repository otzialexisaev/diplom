<template>
    <v-select
        @change="$emit('input', $event)"
        :items="groups"
        item-text="text"
        item-value="id"
        label="Группа"
        :value="this.$attrs.value"
        dense
    ></v-select>
</template>

<script>
export default {
    name: "GroupSelect",
    props: ['course_id'],
    computed: {
        groups: function () {
            return this.$store.state.const.groups[this.$props.course_id];
        }
    }
}
</script>

<style scoped>

</style>
