<template>
    <div class="header"  id="header">
        <div class="login big-l">Login</div>
        <div class="container">
            <div class="row">
                <div class="logo col-3"></div>
                <nav class="navbar col-9 justify-content-end">
                    <div class="login small-l">Login</div>
                    <span class="my-cart-btn"><i class="ion-android-cart"></i></span>
                    <my-navbar></my-navbar>
                    <div class="min-nav">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    import myNavbar from './navbar/myNavbar'
    export default {
        name: "my-header",
        components: {
            myNavbar
        }
    }
</script>

<style scoped>

</style>