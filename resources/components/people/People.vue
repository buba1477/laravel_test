<template>

<div>
    <h3>Все записи</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Контент</th>
            <th scope="col">Автор</th>
            <th scope="col">Файлы</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Дата изменения</th>
            <th scope="col">Изменить</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="ar in arrPerson">
            <th class="align-middle" scope="row">{{ar.id}}</th>
            <td class="align-middle" >{{ar.title}}</td>
            <td class="align-middle" >{{ar.text}}</td>
            <td class="align-middle" >{{ar.author}}</td>
            <td class="align-middle">
                <div class=""  v-for="file in ar.files">
                    <a class="ml-2" style="margin-right: 3px;" href="#" @click.prevent="downloadFile(file.file_path, file.file_name, file.id )">{{ file.file_name }}</a>
                    <a class="" href="#" @click.prevent="deleteFile(file.id)">
                        <i class="bi bi-x-circle-fill"></i>
                    </a>
                </div>
            </td>
            <td class="align-middle" >{{ar.created}}</td>
            <td class="align-middle" >{{ar.updated}}</td>
            <td class="align-middle"><router-link :to="'/edit/' + ar.id" type="button" class="nav-link text-primary">Edit</router-link></td>
            <td class="align-middle"><a @click.prevent="deletePerson(ar.id)" type="button" class="nav-link text-danger">Delete</a></td>
        </tr>
        </tbody>
    </table>
</div>

</template>



<script>

export default {

    data(){
        return {

        }
    },
    computed: {
        arrPerson() {
            return this.$store.getters.arr
        },

    },
    methods: {
       getPeople() {

    this.$store.dispatch('getUsers').then(res =>{

    }).catch(err => {
        console.log(err)
    })
   },
        deletePerson(id) {
           this.$store.dispatch('deletePerson', id).then(res =>{
            })
        },

        downloadFile(path, name, id){

            this.$store.dispatch('downloadFile', [{file_path: path, file_name: name, id:id }]).then(res=>{

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

                    // Создаем ссылку для скачивания
                    const url = window.URL.createObjectURL(blob);

                    // Создаем ссылку на элемент <a> и скачиваем файл
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', fileName);
                    document.body.appendChild(link);
                    link.click();
                    // Очищаем URL объект после скачивания
                    window.URL.revokeObjectURL(url);
                }).catch(err => {
                    console.log(err)
                  })
                })

        },

        deleteFile(id) {

            this.$store.dispatch('deleteFile',id).then(res=>{
                console.log(id)
            })
        }

    },
    mounted(){
        this.getPeople()
    }
}
</script>


<style scoped>

</style>
