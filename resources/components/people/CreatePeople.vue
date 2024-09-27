<template>
<div class="w-50">
    <h3>Создать запись</h3>
    <div class="mb-3">
        <input v-model="title" type="text" class="form-control" id="title" placeholder="title">
        <p class="text-danger">{{titleEmpty}}</p>
    </div>
    <div class="mb-3">
        <input v-model="text" type="text" class="form-control" id="text" placeholder="text">
        <p class="text-danger">{{textEmpty}}</p>
    </div>
    <div class="mb-3">
        <input @click.prevent="setPeople"  class="btn btn-primary"  value="Добавить">
    </div>
</div>
</template>



<script>
import { mapGetters } from 'vuex';
export default {
    data(){
        return {
    title: null,
    text: null
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
            let data = this.$store.dispatch('addPerson', {title: this.title, text: this.text})
                .then(
                res => {
                }).catch(
                err => {
                    console.log(err)
                 }
                )

        }
    }
}
</script>


<style scoped>

</style>
