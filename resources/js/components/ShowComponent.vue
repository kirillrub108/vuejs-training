<script>
export default {
    name: 'ShowComponent',

    props: [
        'person'
    ],

    methods: {
        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.$parent.getPeople()
                })
        },

        changeEditPersonId(id, name, age, job) {
            this.$parent.editPersonId = id
            let editName = `edit_${id}`
            let fullEditName = this.$parent.$refs[editName][0]
            fullEditName.name = name
            fullEditName.age = age
            fullEditName.job = job
        }
    }
}

</script>

<template>
    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' : ''">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <td><a href="#" @click.prevent="this.$parent.changeEditPersonId(person.id, person.name, person.age, person.job)"
               class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>
<style scoped>

</style>
