<template>

    <div class="w-50">
        <h3>Редактировать запись</h3>

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
                <input @click.prevent = editPerson() type="submit" class="btn btn-primary" value="Редактировать">
            </div>

    </div>
</template>


<script>
import {mapGetters} from 'vuex';

export default {
    name: 'EditPeople',
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
        getUser() {

            this.$store.dispatch('getUser', this.$route.params.id)
                .then(res => {

                    this.title = res.data.title
                    this.text = res.data.text
                        this.$store.dispatch('downloadFile', res.data.files).then(res=>{

                            //Скачиваем файлик
                            res.forEach((re) => {
                                const fileName = re.original.name;
                                const fileData = re.original.file; // Преобразуем данные файла в Uint8Array
                                const fileDataDec = atob(fileData);
                                const uint8Array = new Uint8Array(fileDataDec.length);

                                for (let i = 0; i < fileDataDec.length; i++) {
                                    uint8Array[i] = fileDataDec.charCodeAt(i);
                                }
                                // Создаем Blob объект из данных файла
                                const blob = new Blob([uint8Array], { type: 'application/octet-stream' });

                                const file = new File([blob], fileName, { type: 'application/octet-stream' });
                                this.attachedFiles.push(file)

                            })

                            // Создаем новый FileList из массива attachedFiles
                            const newFileList = new DataTransfer();
                            for (const file of this.attachedFiles) {
                                newFileList.items.add(file);
                            }
                            // Обновляем содержимое элемента input[type="file"] после удаления файла
                            const inputElement = document.getElementById('file');
                            inputElement.files = newFileList.files;
                            this.file = newFileList.files

                })

                });

        },
        editPerson() {
            const formDat = new FormData()
            formDat.append('title', this.title)
            formDat.append('text', this.text)

            Array.from(this.file).forEach(fil => {
                formDat.append('file[]', fil);
            });
            this.$store.dispatch('editPerson', {id:this.$route.params.id, data:formDat})
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
            console.log(currentFiles)
            return
            // Добавляем новые файлы к текущему списку файлов

            const newFiles = Array.from(this.attachedFiles);
            for (const file of currentFiles) {
                newFiles.push(file);
            }

            //Создаем массив уникальных значений

            const uniqueFiles = newFiles.filter((file, index, self) =>
                    index === self.findIndex(f =>
                        f.name === file.name &&
                        f.size === file.size
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
    },
    mounted() {
        this.getUser()
    }
}
</script>


<style scoped>

</style>

