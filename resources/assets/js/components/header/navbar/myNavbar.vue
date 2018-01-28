<template>
    <div class="vis">
        <ul class="nav">
            <li v-for="nav in navigation" :class="{ 'submenu-product': nav.sub[0] }" class="nav-item" @click="hideMinNav">
                <router-link :to="nav.alias" class="nav-link">{{nav.name}}</router-link>
                <ul v-if="nav.sub[0]" class="products-nav" :class="{hide: hide}">
                    <li v-for="sub1 in nav.sub" class="nav-item submenu-company" @click="hideSubMenu">
                        <router-link :to="sub1.alias" class="nav-link">{{sub1.name}}</router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item login-small-2">
                <a class="nav-link lco"  @click="showLoginForm">Login</a>
                <a v-if="authenticated" class="nav-link lco"  @click="logout">Logout</a>
            </li>
            <li class="nav-item small-my-cart" @click="hideMinNav">
                <a class="nav-link lco">My cart <i class="ion-android-cart"></i></a>
            </li>
            <div class="form-inline my-2 my-lg-0">
                <input class="search" type="search" placeholder="Search" >
                <span class="search-btn" @click="hideMinNav"><i class="fa ion-android-search"></i></span>
            </div>

        </ul>
    </div>
</template>

<script>
    export default {
        name: "my-navbar",
        data () {
            return {
                navigation: {},
                hide: false
            }
        },
        methods: {
            navigationStatus () {
                let status
                if (this.$store.state.staticData.navigation) {
                    status = true;
                } else {
                    status = false;
                }
                return status;
            },
            hideSubMenu () {
                this.hide = true;
                setTimeout(() => {this.hide = false}, 100);
            },
            hideMinNav () {
                if (this.$store.state.showMinNav) {
                    this.$store.commit('visMinNav');
                }
            },
            showLoginForm () {
                this.hideMinNav();
                this.$store.commit('loginForm');
            },
            logout () {

            }
        },
        computed: {
            authenticated () {
                return this.$store.state.authenticated;
            }
        },
        created () {
            let lang = this.$store.state.language;
            let path = '/' + lang + '/navigation';
            if (! this.navigationStatus()) {
                axios.post(path)
                    .then(response => {
                        this.navigation = response.data;
                        this.$store.commit('navigation', true);
                    })
                    .catch(response => console.log(response));
            }
        }
    }
</script>

<style scoped>
  .hide {
      display: none !important;
  }

  .lco {
      color: #86888a !important;
  }
</style>