<template>
    <div>
        <v-overlay :value="loading"></v-overlay>
        <v-text-field v-model="title"></v-text-field>
        <v-file-input @change="addFile"></v-file-input>
        <v-btn @click="send">Сохранить</v-btn>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            loading: false,
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


            // class UploadFilesService {
            //     upload(file, onUploadProgress) {
            //         let formData = new FormData();
            //
            //         formData.append("file", file);
            //
            //         return http.post("/upload", formData, {
            //             headers: {
            //                 "Content-Type": "multipart/form-data"
            //             },
            //             onUploadProgress
            //         });
            //     }


        }
    }
}
</script>

<style scoped>

</style>
