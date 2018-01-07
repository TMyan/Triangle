<template>
    <div class="home container" id="home">
        <slider :slide="homeData"></slider>
        <spinner v-if="spinner" size="big" message="Loading..." line-fg-color="#000000"></spinner>
    </div>
</template>

<script>
    import Slider from './slider'
    import Spinner from 'vue-simple-spinner'
    export default {
        name: "home",
        components: {
          Slider,
          Spinner
        },
        data () {
            return {
               homeData: [],
               spinner: true
            }
        },
        created () {
            axios.post(this.$route.path)
                .then(response => {
                    this.spinner = false;
                    this.homeData = response.data;
                })
                .catch(response => {
                    console.log(response);
                    this.spinner = false;
                });

        }
    }
</script>

<style scoped>

</style>