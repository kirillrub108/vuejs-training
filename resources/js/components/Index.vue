<script>
export default {
    name: "Index"
}
</script>

<template>
    <div>
        <router-link class="btn btn-primary" :to="{ name: 'person.index' }">People</router-link>
        <router-link class="btn btn-primary mx-2" :to="{ name: 'person.create' }">Add</router-link>
        <router-view class="mt-3"></router-view>
    </div>
</template>

<style scoped>

</style>
