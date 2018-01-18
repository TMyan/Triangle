<template>
    <div class="product-slider">
        <div class="hv">First</div>
        <i class="btn-left ion-chevron-left hv"></i>
        <ul ref="slider">
            <li v-for="n in liCount" class="p-page hv" :class="{active: n===activePage}" @click="productData(n)">{{n}}</li>
            <li v-if="((activePage !== pageCount) && (pageCount > 5))" class="p-page">...</li>
        </ul>
        <i class="btn-right ion-chevron-right hv"></i>
        <div class="hv">Last</div>
    </div>
</template>

<script>
    export default {
        name: "slider",
        data () {
            return {

            }
        },
        props: {
            count: Number,
            activePage: Number
        },
        computed: {
            pageCount: function () {
                return Math.ceil((this.count)/6);
            },
            liCount : function () {
                return (this.pageCount < 5) ? this.pageCount : 5;
            }
        },
        methods: {
            first () {

            },
            last () {

            },
            next () {

            },
            back () {

            },
            productData (page) {
               if (this.activePage !== page) {
                   this.$emit('page', page);
               }
            }
        }

    }
</script>

<style scoped>

    .product-slider {
        text-align: center;
    }

    .product-slider * {
        display: inline-block;
        cursor: pointer;
    }

    .product-slider .hv:hover {
        color: white;
        transform: scale(1.1);
    }



    .product-slider ul {
        padding-left: .5rem;
        padding-right: .5rem;
        margin: 0;
    }

    .p-page {
        list-style-type: none;
        padding-left: 2px;
        padding-right: 2px;
    }


    .btn-left {
        padding-left: .5rem;
    }

    .btn-right {
        padding-right: .5rem;
    }

    .active {
        color: white;
    }

</style>