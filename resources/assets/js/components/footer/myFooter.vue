<template>
    <h1>Footer</h1>
</template>

<script>
    export default {
        name: "my-footer",
        data () {
            return {
                footer: null
            }
        },
        methods: {
            footerStatus () {
                let status
                if (this.$store.state.staticData.footer) {
                    status = true;
                } else {
                    status = false;
                }
                return status;
            }
        },
        created () {
            let lang = this.$store.state.language;
            let path = '/' + lang + '/footer';
            if (! this.footerStatus()) {
                axios.get(path)
                     .then(response => {
                        this.footer = response.data;
                        this.$store.commit('footer', true);
                     })
                     .catch(response => console.log(response));
            }
        }
    }
</script>

<style scoped>

</style>