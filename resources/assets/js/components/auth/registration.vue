<template>
    <div class="register-a">
        <div class="register-b">
            <div class="register-c">
                <div class="close-auth">
                    <i class="ion-close-round" @click="hideRegistrationBlock"></i>
                </div>
                <div class="auth-title">
                    Registration Form
                </div>
                <hr>
                <div class="regInput">
                    <div class="regt">Name</div>
                    <div>
                        <input name="name" v-model="name" v-validate="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('name') }" type="text">
                    </div>
                </div>
                <div class="registration-error">
                    <i v-show="errors.has('name')" class="fa fa-warning"></i>
                    <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                </div>

                <div class="regInput">
                    <div class="regt">Email</div>
                    <div>
                        <input  name="email" v-model="email" v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" type="text">
                    </div>
                </div>
                <div class="registration-error">
                    <i v-show="errors.has('email')" class="fa fa-warning"></i>
                    <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
                </div>

                <div class="regInput">
                    <div class="regt">Password</div>
                    <div>
                        <input name="password" v-model="password" v-validate="'required|min:6'" :class="{'input': true, 'is-danger': errors.has('password') }" type="password">
                    </div>
                </div>
                <div class="registration-error">
                    <i v-show="errors.has('password')" class="fa fa-warning"></i>
                    <span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
                </div>

                <div class="regInput">
                    <div class="regt">Confirm Password</div>
                    <div><input name="password_confirmation" v-model="confirmPassword" v-validate="'required|min:6'" :class="{'input': true, 'is-danger': errors.has('password_confirmation') }" type="password"></div>
                </div>
                <div class="registration-error">
                    <i v-show="errors.has('password_confirmation')" class="fa fa-warning"></i>
                    <span v-show="errors.has('password_confirmation')" class="help is-danger">{{ errors.first('password_confirmation') }}</span>
                </div>
                <div class="rbut">
                    <button type="submit" @click="registration">Registration</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Alert from '../auxiliary/alert'
    import Spinner from 'vue-simple-spinner'
    export default {
        name: "registration",
        components: {
            Alert,
            Spinner
        },
        data () {
          return {
              name: '',
              email: '',
              password: '',
              confirmPassword: ''
          }
        },
        methods: {
            hideRegistrationBlock () {
                this.$store.commit('registration');
            },
            registration () {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        if (this.password === this.confirmPassword){
                            axios.post('/auth/registration',{
                                    name: this.name,
                                    email: this.email,
                                    password: this.password,
                                    confirmPassword: this.confirmPassword
                                })
                                .then(() => {

                                })
                                .catch(() => {

                                })
                        } else {

                        }
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>