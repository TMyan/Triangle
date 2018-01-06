<template>
    <div>
        <div v-if="status" class="alert alertT alert-success" role="alert">
            Your message has been successfully sent.
        </div>
        <div v-else role="alert" class="alert alertT alert-danger">
            <h4 class="alert-heading">Error</h4>
            <div v-for="(item, key) in message">
                <p>{{key + ': ' + item[0]}}</p>
                <hr>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "alert",
        props: {
           message: {
               type: Object,
               default: {}
           },
           status: null
        }
    }
</script>

<style scoped>
    .alertT {
        position: fixed;
        left: 40rem;
        top: 7rem;
        z-index: 1;
    }
</style>