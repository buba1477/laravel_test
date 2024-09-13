<template>
    <div>
        <button @click.prevent="redirectToAuth">Авторизоваться</button>

    </div>
</template>

<script>


export default {
data() {
    return{

    }
},
    mounted() {
        const code = this.$route.query.code;
        if (code) {
            axios.get(`/api/author/${code}`)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }

    },
    methods: {
        redirectToAuth() {
            const authUrl = `http://localhost:8080/auth?response_type=code&client_id=1&redirect_uri=http://localhost:8076/auth`;
            window.open(authUrl, '_self');

        }
    },
    computed: {

    },
}
</script>

<style scoped>

</style>
