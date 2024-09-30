<template>

<div class="w-50">
    <h3>Войти</h3>
    <input v-model="email" type="email" class="form-control mb-3" id="email" placeholder="email">
    <input v-model="pass" type="password" class="form-control mb-3" id="pass" placeholder="password">
    <input type="submit" @click.prevent="login" value="Войти" class="btn btn-primary">
</div>

</template>



<script>

export default {
    name: "Login",
    data(){
        return {
    email: null,
    pass: null
        }
    },
    computed: {

    },
    methods: {
        login(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', {
                    email: this.email,
                    password: this.pass
                }).then(response => {
                    console.log(response);
                    localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'])
                    this.$router.push('/');
                })
            })
        }
    }
}
</script>


<style scoped>

</style>
