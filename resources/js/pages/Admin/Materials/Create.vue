<template>
    <div>
        <v-overlay :value="loading"></v-overlay>
        <v-text-field v-model="title" label="Наименование"></v-text-field>
        <SubjectSelect v-model="subject"></SubjectSelect>
        <v-file-input @change="addFile"></v-file-input>
        <v-btn @click="send">Сохранить</v-btn>
    </div>
</template>

<script>
import SubjectSelect from "@/components/SubjectSelect";

export default {
    name: "Create",
    components: {SubjectSelect},
    data() {
        return {
            loading: false,
            subject: null,
            title: null,
            file: null
        }
    },
    methods: {
        addFile(data) {
            this.file = data;
        },
        send() {
            if (this.title === null) {
                return;
            }
            this.loading = true;
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('title', this.title);
            formData.append('subject_id', this.subject);
            axios.post('/api/admin/materials/store',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then((res) => {
                    this.loading = false;
                })
                .catch((data) => console.log(data));
        }
    }
}
</script>

<style scoped>

</style>
