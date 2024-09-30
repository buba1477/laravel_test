<template>
<div class="w-50">
    <h3>Создать запись</h3>
    <form @submit.prevent="setPeople" enctype="multipart/form-data">
    <div class="mb-3">
        <input v-model="title" type="text" class="form-control" id="title" placeholder="title">
        <p class="text-danger">{{titleEmpty}}</p>
    </div>
    <div class="mb-3">
        <input v-model="text" type="text" class="form-control" id="text" placeholder="text">
        <p class="text-danger">{{textEmpty}}</p>
    </div>
<!--    <div class="mb-3">-->
<!--        <input type="file" @change="handleFileChange" class="form-control" id="file">-->
<!--        <p class="text-danger"></p>-->
<!--    </div>-->
    <div class="mb-3">
        <input type="submit" class="btn btn-primary"  value="Добавить">
    </div>
    </form>
</div>
</template>



<script>
import { mapGetters } from 'vuex';
export default {
    data(){
        return {
    title: null,
    text: null,
    file: null
        }
    },
    computed: {
        ...mapGetters({
            textEmpty: 'errorUpdateText',
            titleEmpty: 'errorUpdateTitle'
        })
    },
    methods: {
        setPeople(){
            const formData = new FormData()
            formData.append('title', this.title)
            formData.append('text', this.text)
            // formData.append('file', this.file)

            let data = this.$store.dispatch('addPerson', formData)
                .then(
                res => {
                    //console.log(res);

                }).catch(
                err => {
                    console.log(err)
                 }
                )

        },
        handleFileChange(e) {
            this.file = e.target.files[0]

        }
    }
}
</script>


<style scoped>

</style>
