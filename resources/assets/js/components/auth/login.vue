<template>
    <div class="login-a">
        <div class="login-b">
            <div class="login-c">
                <div class="close-auth cal">
                    <i class="ion-close-round" @click="hideLoginBlock"></i>
                </div>
                <div class="lem">
                    Email
                    <input type="email" name="email" value="">
                </div>

                <div class="lpas">
                    Password
                    <input type="password" name="password" id="password">
                </div>

                <div class="lrem">
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div class="lbut">
                    <button type="submit">Login</button>
                </div>
                <div class="reglink" @click="showRegistrationBlock">
                    Registration
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "login",
        methods: {
            hideLoginBlock () {
                this.$store.commit('login');
            },
            showRegistrationBlock () {
                this.hideLoginBlock();
                this.$store.commit('registration');
            }
        }
    }
</script>

<style scoped>

</style>