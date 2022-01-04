<template>
    <TestForm :id="id"></TestForm>
</template>

<script>
import TestForm from "@/components/compound/TestForm";

export default {
    name: "Id",
    components: {TestForm},
    data() {
        return {
            id: this.$route.params.id
        }
    }
}
</script>

<style scoped>

</style>
