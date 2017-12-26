<template>
    <div>
        <my-header></my-header>
        <my-content></my-content>
        <my-footer></my-footer>
    </div>
</template>

<script>
    import myContent from './content/myContent'
    import myFooter from './footer/myFooter'
    import myHeader from './header/myHeader'
    export default {
        name: "App",
        components: {
            myHeader,
            myFooter,
            myContent
        }
    }
</script>

<style scoped>

</style>