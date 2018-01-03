<template>
    <div class="home container" id="home">
        <slider :slide="homeData"></slider>
    </div>
</template>

<script>
    import Slider from './slider'
    export default {
        name: "home",
        components: {
          Slider
        },
        data () {
            return {
               homeData: []
            }
        },
        created () {
            axios.post(this.$route.path)
                .then(response => {
                    this.homeData = response.data;
                })
                .catch(response => console.log(response));

        }
    }
</script>

<style scoped>

</style>