<template>
    <div v-if="loaded" class="contact container" id="contact">
        <div class="row">
            <div class=" col-md-6 ">
                <div class="contact-block">
                    <h3 class="contact-title">{{contactData.title}}</h3>
                    <div class="contact-elem"><strong>Adress</strong><i>{{contactData.address}}</i></div>
                    <div class="contact-elem"><strong>Phone</strong><i>{{contactData.phone}}</i></div>
                    <div class="contact-elem"><strong>Email</strong><i>{{contactData.email}}</i></div>
                    <div class="contact-elem wh">{{contactData.text}}</div>

                    <div class="form-block">
                        <div class="form-el">
                            <label for="nameContact">Name</label> <input type="text" placeholder="name" id="nameContact" name="name">
                        </div>
                        <div class="form-el">
                            <label for="phoneContact">Phone</label> <input type="text" placeholder="phone" id="phoneContact" name="phone">
                        </div>
                        <div class="form-el">
                            <label for="emailContact">Email</label> <input type="text" placeholder="email" id="emailContact" name="efmail">
                        </div>
                        <div class="form-el">
                            <label for="subjectContact">Subject</label> <input type="text" placeholder="subject" id="subjectContact" name="subject">
                        </div>
                        <div class="form-el">
                            <label for="messageContact">Message</label> <textarea id="messageContact"></textarea>
                        </div>
                        <div class="btn-c-s">Sand</div>
                    </div>
                </div>
            </div>
            <div class=" col-md-6">
                <div class="contact-block">
                    <maps></maps>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import maps from './maps'
    export default {
        name: "contact",
        components: {
           maps
        },
        data () {
           return{
               loaded: false,
               contactData: {}
           }
        },
        created () {
            axios.post(this.$route.path)
                .then(response => {
                    this.contactData = response.data;
                    this.loaded = true;
                })
                .catch(response => console.log(response));
        }
    }
</script>

<style scoped>

</style>