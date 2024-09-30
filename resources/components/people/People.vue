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
            <td class="align-middle" >{{ar.created}}</td>
            <td class="align-middle" >{{ar.updated}}</td>
            <td><router-link :to="'/edit/' + ar.id" type="button" class="nav-link text-primary">Edit</router-link></td>
            <td ><a @click.prevent="deletePerson(ar.id)" type="button" class="nav-link text-danger">Delete</a></td>
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
    this.$store.dispatch('getUsers')
   },
        deletePerson(id) {
            this.$store.dispatch('deletePerson', id).then(res =>{
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
