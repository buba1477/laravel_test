<template>

<div class="w-50">

</div>

</template>



<script>


export default {
    name: "Oauth",
    data(){
        return {
    email: null,
    pass: null
        }
    },
    computed: {

    },
    methods: {

    },
    mounted() {
        // let code = this.$route.query.code;
        axios.get(`/api/oauth`).then( res=>{
            console.log(res);
        }).catch(err=>{
            console.log(err);
        })
    }
}
</script>


<style scoped>

</style>
