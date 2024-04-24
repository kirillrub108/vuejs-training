<script>
import {mapGetters} from "vuex";

export default {
    name: "Index",

    mounted() {
        this.$store.commit('setPerson', {name: null, age: null, job: null})
        this.$store.dispatch('getPeople')
    },

    computed: {
        ...mapGetters({
            people: 'people',
        })
    }
}
</script>

<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="person in people">
                <td>
                    <router-link :to="{ name: 'person.show', params: { id: person.id } }" class="btn">{{ person.name }}</router-link>
                </td>
                <td>{{ person.age }}</td>
                <td>{{ person.job }}</td>
                <td>
                    <router-link :to="{ name: 'person.edit', params: { id: person.id } }" class="btn btn-outline-success">Edit</router-link>
                </td>
                <td>
                    <input @click.prevent="$store.dispatch('deletePerson', person.id)" type="submit" value="Delete" class="btn btn-outline-danger">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
