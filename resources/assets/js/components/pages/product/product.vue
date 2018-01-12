<template>
    <div class="product container" id="product">
        <div v-if="loadProduct" class="row">
              <div class="col-md-3 filters">
                   <h5>Filters</h5>
                   <div v-for="filter in response.filters" class="filter">
                        <div class="f-par">
                            <span>{{filter.name}}</span>
                            <div class="f-ic"><i class="ion-android-arrow-dropdown"></i></div>
                        </div>
                        <div>
                            <div v-for="(value, index) in filter.data.filter">
                                <div class="fcp"></div>
                                <div class="fnp" @click="productFilter([filter.data.column, filter.data.condition, filter.data.values[index]])">{{value}}</div>
                            </div>
                        </div>
                   </div>
              </div>
            <div class="col-md-9 p-block">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6  product-elem">
                        <div class="p-photo"></div>
                        <div class="p-status">New</div>
                        <div class="p-title">Սմարթֆոն Apple iPhone SE 32GB Gold (A1723)</div>
                        <div class="p-price">
                            <strong>Price.</strong>
                            <span>1000$</span>
                        </div>
                        <div class="p-cart">
                            <span>add</span>
                            <span><i class="ion-android-cart"></i></span>
                        </div>
                        <div class="p-option">
                            <span class="p-more">More</span>
                        </div>
                        <div class="p-vote">
                            <span class="p-like ion-thumbsup"><sub>123m</sub></span>
                            <span class="p-notLike ion-thumbsdown"><sub>679k</sub></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "product",
        data () {
            return {
                options: {
                        skip: 0,
                        take: 6,
                        count: true,
                        filter: undefined
                },
                loadProduct: false,
                request: undefined,
                response: undefined
            }
        },
        methods: {
          requestData () {
              for (var option in this.options){

              }
          },

          productFilter (filter) {
            console.log(filter);
              this.$router.push(filter);
          }
        },
        created () {
            axios.post(this.$route.path,
                  {
                      options: {
                          skip: this.options.skip,
                          take: this.options.take,
                          count: this.options.count
                      }
                  })
                  .then(response => {
                     this.response = response.data;
                     this.loadProduct = true;
                  })
                  .catch(response => {
                      console.log(response)
                  });
        }
    }
</script>

<style scoped>

</style>