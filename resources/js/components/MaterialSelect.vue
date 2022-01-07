<template>
    <v-select
        dense
        @change="$emit('input', $event)"
        :items="materials"
        item-text="title"
        item-value="id"
        label="Материал"
        :value="this.$attrs.value"
    ></v-select>
</template>

<script>
export default {
    name: "MaterialSelect",
    props: ['subject_id'],
    computed: {
        materials: function () {
            return this.$store.state.const.materials[this.$props.subject_id];
        }
    },
    mounted() {
        this.$store.dispatch('loadMaterials');
    }
}
</script>

<style scoped>

</style>
