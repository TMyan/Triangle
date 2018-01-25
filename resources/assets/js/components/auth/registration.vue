<template>
    <div class="register-a">
        <div class="register-b">
            <div class="register-c">
                <div class="close-auth car">
                    <i class="ion-close-round" @click="hideRegistrationBlock"></i>
                </div>
                <div class="regInput">
                    <div class="regt">Name</div>
                    <div><input type="text" name="name" value=""></div>
                </div>

                <div class="regInput">
                    <div class="regt">Email</div>
                    <div> <input type="email" name="email" value=""></div>
                </div>

                <div class="regInput">
                    <div class="regt">Password</div>
                    <div><input type="password" name="password"></div>
                </div>

                <div class="regInput">
                    <div class="regt">Confirm Password</div>
                    <div><input type="password" name="password_confirmation"></div>
                </div>

                <div class="rbut">
                    <button type="submit">Registration</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "registration",
        methods: {
            hideRegistrationBlock () {
                this.$store.commit('registration');
            }
        }
    }
</script>

<style scoped>

</style>