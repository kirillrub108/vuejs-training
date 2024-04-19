<script>
import {defineComponent} from "vue";
import CreateComponent from "@/components/CreateComponent.vue";
import IndexComponent from "@/components/IndexComponent.vue";

export default defineComponent({
    name: 'PostComponent',

    components: {
        IndexComponent,
        CreateComponent
    },

    mounted() {
        console.log(this.$refs.index.name);
    },

    methods: {
        parentLog() {
            console.log('this is ParentComponent!');
        }
    }
})

</script>

<template>
    <div class="container">
        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
    </div>
</template>

<style scoped>

</style>
