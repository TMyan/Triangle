<template>
    <div class="header"  id="header">
        <div class="login big-l" @click="showLoginForm">Login</div>
        <div v-if="authenticated" class="login big-l" @click="logout">Logout</div>
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
                    <div class="login small-l" @click="showLoginForm">Login</div>
                    <div v-if="authenticated" class="login small-l" @click="logout">Logout</div>
                    <span class="my-cart-btn"><i class="ion-android-cart"></i></span>
                    <my-navbar :class="{show: minNav}"></my-navbar>
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

            }
        },
        methods: {
          vis () {
             this.$store.commit('visMinNav');
          },
          showLoginForm () {
              this.$store.commit('loginForm');
          },
          logout () {

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
            },
            minNav () {
                return this.$store.state.showMinNav;
            },
            authenticated () {
                return this.$store.state.authenticated;
            }
        }
    }
</script>

<style scoped>
   .show {
       display: block;
   }
</style>