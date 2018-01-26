<template>
  <div class="content" id="content">
    <login v-if="login"></login>
    <registration v-if="registration"></registration>
    <reset-password v-if="resetPassword"></reset-password>
    <router-view></router-view>
  </div>
</template>

<script>
    import Login from '../auth/login'
    import Registration from '../auth/registration'
    import ResetPassword from '../auth/resetPassword'
    export default {
        name: "my-content",
        components: {
          Login,
          Registration,
          ResetPassword
        },
        computed: {
            login () {
                return this.$store.state.loginBlock;
            },
            registration () {
                return this.$store.state.registrationBlock;
            },
            resetPassword () {
                return this.$store.state.resetPasswordBlock;
            }
        }
    }
</script>

<style scoped>

</style>