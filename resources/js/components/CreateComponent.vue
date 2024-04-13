<script setup>
import {ref} from "vue";
import axios from "axios";

const formData = ref
({
    name: null,
    age: null,
    job: null,
})
async function addPerson() {
    await axios.post('/api/people',
        {
            name: formData.value.name,
            age: formData.value.age,
            job: formData.value.job
        }).then( res => {
            formData.value.name = null
            formData.value.age = null
            formData.value.job = null
        console.log(res);
            getPeople()
    })
}



</script>

<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="formData.name" id="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="formData.age" id="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="formData.job" id="job" placeholder="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addPerson" class="btn btn-primary" id="job" value="Добавить">
        </div>
    </div>
</template>

<style scoped>

</style>
