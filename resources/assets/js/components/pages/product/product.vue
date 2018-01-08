<template>
    <div>
        <div>llllllll</div>
        <router-view></router-view>
        <router-link :to="path" class="xl">xl</router-link>
    </div>
</template>

<script>
    export default {
        name: "product",
        data () {
            return {
                path: this.$route.path + '/product_1'
            }
        }
    }
</script>

<style scoped>
.xl{
   color: white;
}
</style>