<template>
<div class="w-50">
    <div class="mb-3">
        <input v-model="title" type="text" class="form-control" id="title" placeholder="title">
    </div>
    <div class="mb-3">
        <input v-model="text" type="text" class="form-control" id="text" placeholder="text">
    </div>
    <div class="mb-3">
        <input @click.prevent="people"  class="btn btn-primary"  value="Добавить">
    </div>
</div>
</template>



<script>
export default {
    data(){
        return {
    title: null,
    text: null
        }
    },
    methods: {
        people(){
            let data = this.$store.dispatch('addPerson', {title: this.title, text: this.text})
                .then(
                res => {
                    console.log(res)
                }).catch(
                err => {
                    console.log(err)
                }
                )
                this.title = null
                this.text = null

        }
    }
}
</script>


<style scoped>

</style>
