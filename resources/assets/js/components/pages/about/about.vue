<template>
    <div class="about container" id="about">
        <spinner v-if="spinner" size="big" message="Loading..." line-fg-color="#000000"></spinner>
        <div v-if="loaded" class="row">
            <div class="col-12 col-sm-6 abt">
                <h3 class="about-header">{{aboutData.title}}</h3>
                <p class="abour-paragraph">{{aboutData.text}}</p>
            </div>
            <div class="col-sm-6">
                <div class="big-triangle-icon"
                     :style="{backgroundImage:
                     'url(../images/logo/' + aboutData.image + ')'}">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Spinner from 'vue-simple-spinner'
    export default {
        name: "about",
        components: {
          Spinner
        },
        data () {
            return {
                aboutData: {},
                loaded: false,
                spinner: true
            }
        },
        created () {
            axios.post(this.$route.path)
                .then(response => {
                    this.aboutData = response.data;
                    this.loaded = true;
                    this.spinner = false;
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