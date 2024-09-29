<template>
    <div>
        <div class="d-flex justify-content-end m-4 ">
             <ul class="nav mr-2">
            <li v-if="!token" class="mx-2 nav-item"><router-link :to="{name:'Логин'}">Login</router-link></li>
            <li v-if="!token" class="mx-2 nav-item"><router-link to="/register">Register</router-link></li>
            <li v-if="token" class="mx-2 nav-item"><a href="#" @click.prevent="logout">Logout</a></li>
             </ul>
        </div>

            <router-link v-if="token" class="mx-2" to="/" >Список записей</router-link>
            <router-link v-if="token" class="mx-2" to="/create" >Создать запись</router-link>

        <div class="mt-4">
            <router-view :key="$route.fullPath"></router-view>
        </div>

    </div>
</template>

<script>


export default {
    name: "App",
    components: {

    },
    mounted() {
        this.getToken()
    },
    updated() {
        this.getToken()
    },

    data() {
        return {
            token: null
        }
    },
    methods: {
        getToken() {
           this.token = localStorage.getItem('x_xsrf_token')
        },
        logout() {
            axios.post('/logout').then(response => {
                localStorage.removeItem('x_xsrf_token')
                this.$router.push('/login');
            })
        }
    }
}
</script>

<style scoped>
a, .router-link {
    text-decoration: none;
}
</style>
