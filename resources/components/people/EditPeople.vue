<template>

    <div class="w-50">
        <h3>Редактировать запись</h3>
        <div class="mb-3">
            <input v-model="title" type="text" class="form-control" id="title" placeholder="title">
            <p class="text-danger">1</p>
        </div>
        <div class="mb-3">
            <input v-model="text" type="text" class="form-control" id="text" placeholder="text">
            <p class="text-danger">2</p>
        </div>
        <div class="mb-3">
            <input @click.prevent="editPerson"  class="btn btn-primary"  value="Добавить">
        </div>
    </div>

</template>


<script>

export default {
    name: 'EditPeople',
    data(){
        return {
            title: null,
            text: null
        }
    },
    computed: {

    },
    methods: {
       getUser() {

    this.$store.dispatch('getUser', this.$route.params.id)
        .then(res =>{
            this.title = res.title
            this.text = res.text
        });

   },
        editPerson() {
            this.$store.dispatch('editPerson', {title: this.title, text: this.text, id: this.$route.params.id})
            .then(
            res => {
               // console.log(this.$store.getters.errorUpdate.text);
                // this.$router.push({ path: '/' });
            }).catch(
            err => {
               console.log(err)
            }
            )

        }
   },
    mounted(){
        this.getUser()
    }
}
</script>


<style scoped>

</style>
