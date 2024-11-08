<template>
    <div class="w-50">
        <h3>Создать запись</h3>
        <form @submit.prevent="setPeople" enctype="multipart/form-data">
            <div class="mb-3">
                <input v-model="title" type="text" class="form-control" id="title" placeholder="title">
                <p class="text-danger">{{ titleEmpty }}</p>
            </div>
            <div class="mb-3">
                <input v-model="text" type="text" class="form-control" id="text" placeholder="text">
                <p class="text-danger">{{ textEmpty }}</p>
            </div>
            <div class="mb-3">
                <input type="file" @change="handleFileChange" class="form-control" id="file" multiple>
                <p class="text-danger"></p>
            </div>
            <!-- Отображение выбранных файлов -->
            <div v-if="attachedFiles.length > 0" class="">
                <ul>
                    <li v-for="(file, index) in attachedFiles" :key="index">
                        {{ file.name }}
                        <a href="#" class="" @click.prevent="removeAttachedFile(index)">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Добавить">
            </div>
        </form>

    </div>
</template>


<script>
import {mapGetters} from 'vuex';

export default {
    data() {
        return {
            title: null,
            text: null,
            file: null,
            attachedFiles: []
        }
    },
    computed: {
        ...mapGetters({
            textEmpty: 'errorUpdateText',
            titleEmpty: 'errorUpdateTitle'
        })
    },
    methods: {
        setPeople() {

            const formData = new FormData()

            formData.append(' title', this.title)
            formData.append('text', this.text)
            if (this.file) {
                Array.from(this.file).forEach(fil => {
                    formData.append('file[]', fil);
                });
            }
            let data = this.$store.dispatch('addPerson', formData)
                .then(
                    res => {

                    }).catch(
                    err => {
                        console.log(err)
                    }
                )

        },
        handleFileChange(e) {
            const currentFiles = Array.from(e.target.files);

            // Добавляем новые файлы к текущему списку файлов

            const newFiles = Array.from(this.attachedFiles);

            for (const file of currentFiles) {
                newFiles.push(file);
            }

            //Создаем массив уникальных значений

            const uniqueFiles = newFiles.filter((file, index, self) =>
                    index === self.findIndex(f =>
                        f.name === file.name &&
                        f.size === file.size &&
                        f.lastModified === file.lastModified
                    )
            );
            // Присваиваем обновленный список файлов обратно в input
            this.attachedFiles = uniqueFiles;

            const newFileInput = new DataTransfer();
            for (const file of uniqueFiles) {
                newFileInput.items.add(file);
            }
            const inputElement = document.getElementById('file');

            inputElement.files = newFileInput.files;
            this.file = newFileInput.files
        },
        removeAttachedFile(index) {
            this.attachedFiles.splice(index, 1);

            // Создаем новый FileList из массива attachedFiles
            const newFileList = new DataTransfer();
            for (const file of this.attachedFiles) {
                newFileList.items.add(file);
            }

            // Обновляем содержимое элемента input[type="file"] после удаления файла
            const inputElement = document.getElementById('file');
            inputElement.files = newFileList.files;
            this.file = newFileList.files
        },
        mounted() {
            this.$on('call-method', this.methodToCall);
        }
    }
}
</script>


<style scoped>

</style>
