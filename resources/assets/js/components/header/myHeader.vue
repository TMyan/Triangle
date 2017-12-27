<template>
    <div>
        <my-navbar :nav="header"></my-navbar>
    </div>
</template>

<script>
    import myNavbar from './navbar/myNavbar'
    export default {
        name: "my-header",
        data () {
          return {
              header: null
          }
        },
        components: {
            myNavbar
        },
        methods: {
            headerStatus () {
                let status
                if (this.$store.state.staticData.header) {
                    status = true;
                } else {
                    status = false;
                }
               return status;
            },
        },
        created () {
            let lang = this.$store.state.language;
            let path = '/' + lang + '/navigation';
            if (! this.headerStatus()) {
              axios.get(path)
                   .then(response => {
                      this.header = response.data;
                      this.$store.commit('header', true);
                   })
                   .catch(response => console.log(response));
            }
        }
    }
</script>

<style scoped>

</style>