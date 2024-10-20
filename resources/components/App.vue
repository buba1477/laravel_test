<template>
    <div>
        <div class="d-flex justify-content-end m-4 ">
             <ul class="nav mr-2">
            <li v-if="!token" class="mx-2 nav-item"><router-link :to="{name:'Логин'}">Login</router-link></li>
            <li  v-if="!token" class="mx-2 nav-item"><router-link to="/register">Register</router-link></li>
            <li  v-if="token"class="mx-2 nav-item"><a href="#" @click.prevent="logout">Logout</a></li>
            <li  class="mx-2 nav-item"><a href="#" @click.prevent="oauth">вход через oauth</a></li>
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

import api from "../js/api";
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
        // getToken() {
        //    this.token = localStorage.getItem('x_xsrf_token')
        // },
        // logout() {
        //     axios.post('/logout').then(response => {
        //         localStorage.removeItem('x_xsrf_token')
        //         this.$router.push('/login');
        //     })
        // },

        getToken() {
           this.token = localStorage.getItem('access_token')
        },
        logout() {

            api.post('/api/auth/logout').then(response => {
                localStorage.removeItem('access_token')
                this.$router.push('/login');
            }).catch(error => {
                console.log(error)
            })
        },
        oauth() {
           // window.location.href = 'http://localhost:8080/auth?response_type=code&client_id=1&redirect_uri=http://localhost:8076/oauth';
        }
    }
}
</script>

<style scoped>
a, .router-link {
    text-decoration: none;
}
</style>
