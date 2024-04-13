<script setup>
    import {ref, onMounted, reactive} from 'vue';
    import { computed } from 'vue'
    import axios from "axios";
    import CreateComponent from "@/components/CreateComponent.vue";
    import IndexComponent from "@/components/IndexComponent.vue";


    const index = ref(null);

    onMounted(() => {
        console.log(index.value.indexLog());
    });



    // async function fetchData() {
    //
    //     const response = await axios.get('/posts')
    //     const data = response.data
    //
    //     alert(JSON.stringify(data))
    //
    // }
    //
    // const personsMoreWhen18 = computed(() => {
    //     return arr.persons.filter(function (person) {
    //         return person.age > 18
    //     })
    // })
    // const sayHello = () => {
    //     alert('Hello!');
    // };
    //
    // onMounted(() => {
    //     getPosts()
    // })
    // async function getPosts() {
    //     const response = await axios.get('/posts')
    //     const data = response.data
    //
    //     alert(JSON.stringify(data))
    // }
    //
    //
    //
    // const arr = reactive({
    //
    //     }
    // )
</script>

<template>
    <div class="container">
        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
<!--        <button @click="fetchData" >helo</button>-->
    </div>
</template>

<style scoped>

</style>
