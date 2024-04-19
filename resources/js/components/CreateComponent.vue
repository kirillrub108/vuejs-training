<script>
import SomeComponent from "@/components/SomeComponent.vue";

export default {
    name: 'CreateComponent',

    data() {
        return {
            name: null,
            age: null,
            job: null,
            obj: {
                color: 'black',
                number: 5,
                isPublished: true
            }
        }
    },

    mounted() {
        this.$parent.$refs.index.indexLog()
    },

    methods: {
        addPerson() {
            axios.post('/api/people',
                {
                    name: this.name,
                    age: this.age,
                    job: this.job,
                }).then(res => {
                this.name = null
                this.age = null
                this.job = null
                this.$parent.$refs.index.getPeople()
            })
        }
    },

    components: {
        SomeComponent
    }
}

</script>

<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="this.name" id="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="this.age" id="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="this.job" id="job" placeholder="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addPerson" class="btn btn-primary" id="job" value="Добавить">
        </div>
        <SomeComponent :obj="obj"></SomeComponent>
    </div>
</template>

<style scoped>

</style>
