<template>
    <div class="product-slider">
        <div class="hv" @click="first">First</div>
        <i class="btn-left ion-chevron-left hv" @click="backP"></i>
        <ul ref="slider">
            <li v-for="n in liCount" class="p-page hv" :class="{active: page===skipTk+n}" @click="pageData(skipTk+n, skipTk)">{{skipTk+n}}</li>
            <li v-if="(pageCount-skipTk) > 5" class="p-page">...</li>
        </ul>
        <i class="btn-right ion-chevron-right hv" @click="nextP"></i>
        <div class="hv" @click="last">Last</div>
    </div>
</template>

<script>
    export default {
        name: "slider",
        data () {
            return {
               skipTk: this.skip
            }
        },
        props: {
            count: Number,
            page: Number,
            skip: Number
        },
        computed: {
            pageCount: function () {
                return Math.ceil(this.count/6);
            },
            liCount: function () {
                let item = this.pageCount - this.skipTk;
                if (item < 5) {
                    return item;
                } else {
                    return 5;
                }
            }
        },
        methods: {
            nextP () {
                if (this.pageCount - this.skipTk  > 5 ){
                    this.skipTk += 5;
                }
            },
            backP () {
                if (this.skipTk > 0){
                    this.skipTk -= 5;
                }
            },
            first () {
                if (this.page !== 1) {
                    this.pageData(1,0);
                }
            },
            last () {
               if (this.page !== this.pageCount) {
                   let mul = Math.floor(this.pageCount/5);
                   if (this.pageCount > 5) {
                       this.pageData(this.pageCount, mul * 5);
                   }else {
                       this.pageData(this.pageCount, 0);
                   }
               }
            },
            pageData (page, skip) {
                if (this.page !== page) {
                    this.$emit('page', page,skip);
                }
            }
        },
        created () {

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