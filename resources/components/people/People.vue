<template>

<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Контент</th>
            <th scope="col">Изменить</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="ar in arrPerson">
            <th scope="row">{{ar.id}}</th>
            <td>{{ar.title}}</td>
            <td>{{ar.text}}</td>
            <td><router-link :to="'/edit/' + ar.id" type="button" class="nav-link">Edit</router-link></td>
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
        }
    },
    methods: {
       getPeople() {
    this.$store.dispatch('getUsers')
   }
    },
    mounted(){
        this.getPeople()
    }
}
</script>


<style scoped>

</style>
