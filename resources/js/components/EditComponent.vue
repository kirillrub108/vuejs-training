<script>
export default {
    name: 'EditComponent',

    data() {
        return {
            name: null,
            age: null,
            job: null,
        }
    },

    props: [
        'person'
    ],

    methods: {
        updatePerson(id) {
            this.$parent.editPersonId = null
            axios.patch(`/api/people/${id}`,
                {
                    name: this.name,
                    age: this.age,
                    job: this.job
                })
                .then(res => {
                    this.$parent.getPeople()
                })
        }
    }
}

</script>

<template>
    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <td><input type="text" class="form-control" v-model="name"></td>
        <td><input type="number" class="form-control" v-model="age"></td>
        <td><input type="text" class="form-control" v-model="job"></td>
        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
    </tr>
</template>

<style scoped>

</style>
