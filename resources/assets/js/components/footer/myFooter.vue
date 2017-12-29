<template>
    <div class="footer" id="footer">
        <div class="container">
            <div>{{footer.text}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "my-footer",
        data () {
            return {
                footer: {}
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