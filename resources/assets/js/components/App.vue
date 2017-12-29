<template>
    <div class="Triangle">
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
        },
        methods: {
            currentLanguage () {
                let pathname = window.location.pathname;
                let language = pathname.split('/')[1];
                return language;
            }
        },
        created () {
            let lang = this.currentLanguage();
            if (this.$store.state.language !== lang) {
                this.$store.commit('language', lang);
            }
        }
    }
</script>

<style scoped>

</style>