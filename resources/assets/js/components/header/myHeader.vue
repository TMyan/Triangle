<template>
    <div class="header"  id="header">
        <div class="login big-l">Login</div>
        <div class="lang-block big-lang">{{lang}}
            <div class="lang"><a :href="'/en' + path">En</a></div>
            <div class="lang"><a :href="'/ru' + path">Ru</a></div>
            <div class="lang"><a :href="'/am' + path">Am</a></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="logo col-2"></div>
                <nav class="navbar col-10 justify-content-end">
                    <div class="lang-block small-lang">{{lang}}
                        <div class="lang"><a :href="'/en' + path">En</a></div>
                        <div class="lang"><a :href="'/ru' + path">Ru</a></div>
                        <div class="lang"><a :href="'/am' + path">Am</a></div>
                    </div>
                    <div class="login small-l">Login</div>
                    <span class="my-cart-btn"><i class="ion-android-cart"></i></span>
                    <my-navbar :class="{show: nav}"></my-navbar>
                    <div @click="vis" class="min-nav">
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
        data () {
            return {
                 nav: false
            }
        },
        methods: {
          vis () {
             if (this.nav) {
                 this.nav = false;
             } else {
                 this.nav = true;
             }
          }
        },
        components: {
            myNavbar
        },
        computed : {
            lang () {
               let lang = this.$store.state.language;
               return lang.toUpperCase();
            },
            path () {
                return (this.$route.path).slice(3);
            }
        }
    }
</script>

<style scoped>
   .show {
       display: block;
   }
</style>