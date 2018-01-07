<template>
    <div class="contact container" id="contact">
        <spinner v-if="spinner" size="big" message="Loading..." line-fg-color="#000000"></spinner>
        <div v-if="loaded" class="row">
            <alert v-if="alertModal" :message="alertMessage" :status="sentStatus"></alert>
            <div class=" col-md-6 ">
                <div class="contact-block">
                    <h3 class="contact-title">{{serviceData.title}}</h3>
                    <div class="contact-elem"><strong>Adress</strong><i>{{serviceData.address}}</i></div>
                    <div class="contact-elem"><strong>Phone</strong><i>{{serviceData.phone}}</i></div>
                    <div class="contact-elem"><strong>Email</strong><i>{{serviceData.email}}</i></div>
                    <div class="contact-elem wh">{{serviceData.text}}</div>

                    <div class="form-block">
                        <div class="form-el">
                            <label class="label">Name</label>
                            <input name="name" v-model="name" v-validate.initial="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('name') }" type="text" placeholder="Name">
                            <i v-show="errors.has('name')" class="fa fa-warning"></i>
                            <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                        </div>
                        <div class="form-el">
                            <label class="label">Phone</label>
                            <input name="phone" v-model="phone" v-validate.initial="'required|numeric|min:10'" :class="{'input': true, 'is-danger': errors.has('phone') }" type="text" placeholder="Phone">
                            <i v-show="errors.has('phone')" class="fa fa-warning"></i>
                            <span v-show="errors.has('phone')" class="help is-danger">{{ errors.first('phone') }}</span>
                        </div>
                        <div class="form-el">
                            <label class="label">Email</label>
                            <input name="email" v-model="email" v-validate.initial="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" type="text" placeholder="Email">
                            <i v-show="errors.has('email')" class="fa fa-warning"></i>
                            <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
                        </div>
                        <div class="form-el">
                            <label class="label">Subject</label>
                            <input name="subject" v-model="subject" v-validate.initial="'required|alpha'" :class="{'input': true, 'is-danger': errors.has('subject') }" type="text" placeholder="Subject">
                            <i v-show="errors.has('subject')" class="fa fa-warning"></i>
                            <span v-show="errors.has('subject')" class="help is-danger">{{ errors.first('subject') }}</span>
                        </div>
                        <div class="form-el">
                            <label class="lable">Message</label>
                            <textarea name="message" v-model="message" v-validate.initial="'required'" :class="{'is-danger': errors.has('subject') }" placeholder="Message"></textarea>
                            <i v-show="errors.has('message')" class="fa fa-warning"></i>
                            <span v-show="errors.has('message')" class="help is-danger">{{ errors.first('message') }}</span>
                        </div>
                        <div class="btn-c-s" @click="sendMessage">Sand</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import alert from '../../auxiliary/alert'
    import Spinner from 'vue-simple-spinner'
    export default {
        name: "service",
        components: {
            alert,
            Spinner
        },
        data () {
            return{
                loaded: false,
                serviceData: {},
                spinner: true,
                email: '',
                name: '',
                phone: '',
                subject: '',
                message: '',
                sentStatus: null,
                alertModal: null,
                alertMessage: {}
            }
        },
        methods: {
            sendMessage () {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post(this.$route.path,
                            { name: this.name,
                                email: this.email,
                                phone: this.phone,
                                subject: this.subject,
                                message: this.message,
                                data: true
                            })
                            .then(() => {
                                this.alertModal = true;
                                this.sentStatus = true;
                                this.clearForm();
                                setTimeout(() => {
                                    this.alertModal = null;
                                    this.sentStatus = null;
                                }, 2000);
                            })
                            .catch(error => {
                                let errors = error.response.data.errors;
                                this.alertModal = true;
                                this.alertMessage = errors;
                                setTimeout(() => {
                                    this.alertModal = null;
                                    this.alertMessage = {};
                                }, 5000)
                            });
                    }
                });
            },
            clearForm () {
                this.name = '';
                this.email = '';
                this.phone = '';
                this.subject = '';
                this.message = '';
            }
        },
        created () {
            axios.post(this.$route.path)
                .then(response => {
                    this.serviceData = response.data;
                    this.spinner = false
                    this.loaded = true;
                })
                .catch(response => console.log(response));
        }
    }
</script>

<style scoped>

</style>