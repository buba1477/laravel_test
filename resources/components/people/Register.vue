<template>

    <div class="w-50">
        <h3>Регистрация</h3>
        <input v-model="name" type="text" class="form-control mb-3" placeholder="name">
        <input v-model="email" type="email" class="form-control mb-3"  placeholder="email">
        <input v-model="password" type="password" class="form-control mb-3"  placeholder="password">
        <input v-model="password_confirmation" type="password" class="form-control mb-3" placeholder="password_confirmation">
        <input type="submit" @click.prevent="register" value="Отправить" class="btn btn-primary">
    </div>

</template>



<script>

export default {
    name: "Register",
    data(){
        return {
name: '',
email: '',
password: '',
password_confirmation: ''
        }
    },
    computed: {

    },
    methods: {

        // register() {
        //     axios.get('/sanctum/csrf-cookie').then(response => {
        //         axios.post('/register', {
        //             name: this.name,
        //             email: this.email,
        //             password: this.password,
        //             password_confirmation: this.password_confirmation
        //         }).then(response => {
        //             console.log(response);
        //             localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'] || '')
        //             this.$router.push('/');
        //         })
        //     })
        // }


        register() {
            axios.post('/register', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }).then(response => {
                // console.log(response);
                axios.post('/api/auth/login', {
                    email: this.email,
                    password: this.password
                }).then(res => {
                    localStorage.setItem('access_token', res.data.access_token);
                    this.$router.push({name: 'Люди'});
                })
                // })
                // localStorage.setItem('access_token', response.data.access_token);
                // this.$router.push('/');
            }).catch(error => {
                console.log(error)
            })
        },

    },
}
</script>


<style scoped>

</style>
