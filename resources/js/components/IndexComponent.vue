<script>
import EditComponent from "@/components/EditComponent.vue";
import ShowComponent from "@/components/ShowComponent.vue";
export default {
    name: 'IndexComponent',

    data() {
        return {
            people: [],
            editPersonId: null,
            name: null,
            age: null,
            job: null,
        }
    },

    mounted() {
        this.getPeople()
    },

    methods: {
        getPeople() {
            axios.get('/api/people')
                .then(res => {
                    this.people = res.data
                })
        },

        updatePerson(id) {
            axios.patch(`/api/people/${id}`,
                {
                    name: this.name,
                    age: this.age,
                    job: this.job
                })
                .then(res => {
                    this.getPeople()
                })
        },

        changeEditPersonId(id, name, age, job) {
            this.editPersonId = id
            let editName = `edit_${id}`
            let fullEditName = this.$refs[editName][0]
            fullEditName.name = name
            fullEditName.age = age
            fullEditName.job = job
        },

        isEdit(id) {
            return this.editPersonId === id
        },

        indexLog() {
            console.log('this is IndexComponent!');
        }
    },

    components: {
        ShowComponent,
        EditComponent,
    }
}

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
                <ShowComponent :person="person"></ShowComponent>
                <EditComponent :person="person" :ref=" `edit_${person.id}` "></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
