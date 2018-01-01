<template>
    <div class="header"  id="header">
        <div class="login big-l">Login</div>
        <div class="lang-block big-lang">En
            <div class="lang"><a>En</a></div>
            <div class="lang"><a>Ru</a></div>
            <div class="lang"><a>Am</a></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="logo col-2"></div>
                <nav class="navbar col-10 justify-content-end">
                    <div class="lang-block small-lang">En
                        <div class="lang"><a>En</a></div>
                        <div class="lang"><a>Ru</a></div>
                        <div class="lang"><a>Am</a></div>
                    </div>
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