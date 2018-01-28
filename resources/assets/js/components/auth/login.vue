<template>
    <div class="login-a">
        <div class="login-b">
            <div class="login-c">
                <div class="close-auth">
                    <i class="ion-close-round" @click="closeLoginForm"></i>
                </div>
                <div class="auth-title">
                    Login Form
                </div>
                <hr>
                <div class="lem">
                    Email
                    <input  name="email" v-model="email" v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" type="text">
                    <i v-show="errors.has('email')" class="fa fa-warning"></i>
                    <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
                </div>

                <div class="lpas">
                    Password
                    <input name="password" v-model="password" v-validate="'required|min:6'" :class="{'input': true, 'is-danger': errors.has('password') }" type="password">
                    <i v-show="errors.has('password')" class="fa fa-warning"></i>
                    <span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
                </div>

                <div class="lrem">
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div class=llk >
                    <div @click="showResetPasswordForm">Forgot Your Password? </div>
                </div>
                <div class=llk >
                    <div @click="showRegistrationForm">Are you registered? </div>
                </div>
                <div class="lbut">
                    <button type="submit" @click="login">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Alert from '../auxiliary/alert'
    import Spinner from 'vue-simple-spinner'
    export default {
        name: "login",
        components: {
          Alert,
          Spinner
        },
        data () {
          return {
              email: '',
              password: ''
          }
        },
        methods: {
            closeLoginForm () {
                this.$store.commit('loginForm');
            },
            showRegistrationForm () {
                this.closeLoginForm();
                this.$store.commit('registrationForm');
            },
            showResetPasswordForm () {
                this.closeLoginForm();
                this.$store.commit('resetPasswordForm');
            },
            login () {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('/auth/login',{
                                email: this.email,
                                password: this.password
                            })
                            .then(response => {

                            })
                            .catch(error => {
                               console.log(error);
                            })
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>