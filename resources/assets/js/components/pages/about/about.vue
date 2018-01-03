<template>
    <div v-if="loaded" class="about container" id="about">
        <div class="row">
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
    export default {
        name: "about",
        data () {
            return {
                aboutData: {},
                loaded: false
            }
        },
        created () {
            axios.post(this.$route.path)
                .then(response => {
                    this.aboutData = response.data;
                    this.loaded = true;
                })
                .catch(response => console.log(response));
        }
    }
</script>

<style scoped>

</style>