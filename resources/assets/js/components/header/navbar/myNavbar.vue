<template>
    <div class="vis">
        <ul class="nav">
            <li v-for="nav in navigation" :class="{ 'submenu-product': nav.sub[0] }" class="nav-item">
                <a class="nav-link" :href="nav.alias">{{nav.name}}</a>
                <ul v-if="nav.sub[0]" class="products-nav">
                    <li v-for="(sub1, key) in nav.sub" class="nav-item submenu-company">
                        <a class="nav-link" :href="sub1.alias">{{sub1.name}}</a>
                        <ul v-if="sub1.sub[0]" :style="{top: (key * 2.5) + 'rem'}" class="products-nav-elem">
                            <li v-for="sub2 in sub1.sub" class="nav-item">
                                <a class="nav-link" :href="sub2.alias">{{sub2.name}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <div class="form-inline my-2 my-lg-0">
                <input class="search" type="search" placeholder="Search" >
                <span class="search-btn"><i class="fa ion-android-search"></i></span>
            </div>

        </ul>
    </div>
</template>

<script>
    export default {
        name: "my-navbar",
        data () {
            return {
                navigation: {}
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
        },
        created () {
            let lang = this.$store.state.language;
            let path = '/' + lang + '/navigation';
            if (! this.navigationStatus()) {
                axios.get(path)
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

</style>