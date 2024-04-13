<script setup>

import {onMounted, ref, defineExpose, computed} from "vue";
import axios from "axios";

const people = ref([])

const editPersonId = ref(null)
const name = ref()
const age = ref()
const job = ref()

const indexElement = ref(null)



onMounted(getPeople)
async function getPeople() {
    await axios.get('/api/people')
        .then( res => {
            people.value = res.data
        })
}

async function updatePerson(id) {
    editPersonId.value = null
    await axios.patch(`/api/people/${id}`,
        {
            name: name.value,
            age: age.value,
            job: job.value
        })
        .then( res => {
            getPeople()
        })
}

async function deletePerson(id) {
    await axios.delete(`/api/people/${id}`)
        .then( res => {
            getPeople()
        })
}

const changeEditPersonId = (id, personName, personAge, personJob) => {
    editPersonId.value = id
    name.value = personName;
    age.value = personAge;
    job.value = personJob;
}

const isEdit = (id) => {
    return editPersonId.value === id
}

const indexLog = () => {
    console.log('this is indexcomponent!');
};

defineExpose({ indexElement, indexLog })

</script>

<template>
    <div ref="indexElement">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" class="form-control" v-model="name"></td>
                    <td><input type="number" class="form-control" v-model="age"></td>
                    <td><input type="text" class="form-control" v-model="job"></td>
                    <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
