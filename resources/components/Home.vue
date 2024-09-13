<template>
    <div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="ar in person">
            <th scope="row">{{ ar.id }}</th>
            <td>{{ ar.title }}</td>
            <td>{{ ar.likes }}</td>
        </tr>
        </tbody>
    </table>
    <button @click="getUsers" class="btn btn-danger">Get Users</button>

    </div>
</template>

<script>


export default {
data() {
    return{

    }
},
    mounted() {
         this.$store.dispatch('getUsers');
    },
    methods: {

    },
    computed: {
        person() {
           return this.$store.getters.arr;
        }
    }
}
</script>

<style scoped>

</style>
