<template>
    <div class="forgot-p-a">
        <div class="forgot-p-b">
            <div class="forgot-p-c">
                <div class="close-auth">
                    <i class="ion-close-round" @click="hideLoginBlock"></i>
                </div>
                <hr>
                <div class="fInput">
                    <div class="regt">E-Mail Address</div>
                    <div>
                        <input  name="email" v-model="email" v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" type="text">
                    </div>
                </div>
                <div class="forgot-error">
                    <i v-show="errors.has('email')" class="fa fa-warning"></i>
                    <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
                </div>
                <div class="fbut">
                    <button type="submit" @click="confirmRegistration ">Password Reset Link</button>
                </div>
                <div class="auth-title">
                    Reset Password Form
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Alert from '../auxiliary/alert'
    import Spinner from 'vue-simple-spinner'
    export default {
        name: "reset-password",
        components: {
          Alert,
          Spinner
        },
        data () {
          return {
              email: ''
          }
        },
        methods: {
            hideLoginBlock (){
               this.$store.commit('resetPassword');
            },
            confirmRegistration () {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('/auth/confirmRegistration ',{
                                 email: this.email
                            })
                            .then(() => {

                            })
                            .catch(() => {

                            })
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>