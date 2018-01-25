<template>
  <div class="content" id="content">
    <login v-if="login"></login>
    <registration v-if="registration"></registration>
    <router-view></router-view>
  </div>
</template>

<script>
    import Login from '../auth/login'
    import Registration from '../auth/registration'
    export default {
        name: "my-content",
        components: {
          Login,
          Registration
        },
        computed: {
            login () {
                return this.$store.state.loginBlock;
            },
            registration () {
                return this.$store.state.registrationBlock;
            }
        }
    }
</script>

<style scoped>

</style>