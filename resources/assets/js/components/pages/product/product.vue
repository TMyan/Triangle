<template>
    <div class="product container" id="product">
        <spinner v-if="spinnerPage" size="big" message="Loading..." line-fg-color="#000000"></spinner>
        <div v-if="loadPage" class="row">
              <div class="col-md-3 filters">
                   <h5>Filters</h5>
                   <div v-for="filter in response.filters" class="filter">
                        <div class="f-par">
                            <span>{{filter.name}}</span>
                            <div class="f-ic"><i class="ion-android-arrow-dropdown"></i></div>
                        </div>
                        <div>
                            <div  v-for="(value, index) in filter.data.filter">
                                <div class="wMax" @click="productFilter([filter.data.column, filter.data.condition, filter.data.values[index]], $event)">
                                    <div class="fcp"></div>
                                    <div class="fnp">{{value}}</div>
                                </div>
                            </div>
                        </div>
                   </div>
              </div>
            <div class="col-md-9 p-block">
                <spinner v-if="spinnerProduct" size="medium" message="Loading..." line-fg-color="#000000"></spinner>
                <div v-if="loadProduct" class="row">
                    <div v-for="product in response.data" class="col-lg-4 col-md-6 col-sm-6  product-elem">
                        <div class="p-photo" :style="{backgroundImage: 'url(../images/products/' + product.photo + ')'}"></div>
                        <div class="p-status">{{product.status}}</div>
                        <div class="p-title">{{product.model}}</div>
                        <div class="p-price">
                            <strong>Price.</strong>
                            <span>{{product.price}}$</span>
                        </div>
                        <div class="p-cart">
                            <span>add</span>
                            <span><i class="ion-android-cart"></i></span>
                        </div>
                        <div class="p-option">
                            <span class="p-more">More</span>
                        </div>
                        <div class="p-vote">
                            <span class="p-like ion-thumbsup"><sub>{{product.likes}}</sub></span>
                            <span class="p-notLike ion-thumbsdown"><sub>{{product.dislikes}}</sub></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Spinner from 'vue-simple-spinner'
    export default {
        name: "product",
        components: {
          Spinner
        },
        data () {
            return {
                options: {
                        page: 1,
                        count: true,
                        filter: undefined
                },
                response: {
                    data: {},
                    filters: {},
                    count: undefined
                },
                spinnerPage: true,
                spinnerProduct: true,
                loadPage: false,
                loadProduct: false,
                filters: [],
            }
        },
        methods: {
          category () {
              axios.post(this.$route.path)
                  .then(response => {
                      this.response = response.data;
                      this.loadPage = true;
                      this.loadProduct = true;
                      this.spinnerPage = false;
                      this.spinnerProduct = false;
                  })
                  .catch(response => {
                      this.spinnerPage = false;
                      console.log(response)
                  });
          } ,
          active (event) {
              let elem = event.currentTarget.firstChild;
              if (elem.classList.contains("checkActive")) {
                  elem.classList.remove("checkActive");
              } else {
                  elem.classList.add("checkActive");
              }
          },
          requestData () {
              this.loadProduct = false;
              this.spinnerProduct = true;
              let options = this.options;
              let request = {
                  options: {

                  }
              };
              for (let option in options){
                  if (options[option]) {
                      request.options[option] = options[option];
                  }
              }

              axios.post(this.$route.path, request)
                   .then(response => {
                      this.loadProduct = true;
                      this.spinnerProduct = false;
                      this.response.data = response.data.data;
                      if (response.data.count) {
                          this.response.count = response.data.count;
                      }
                   })
                   .catch(response => {
                       this.spinnerProduct = false;
                       console.log(response)
                   });

          },

          productFilter (filter, event) {
              this.active(event);
              let filters = this.filters;
              let where = [];
              let whereIn = [];
              let stat2 = true;
              for (let i = 0; i < filters.length; i++) {
                  if (filters[i][0] === filter[0]) {
                      let elems = filters[i][2];
                      let stat1 = false
                      for (let j = 0; j < elems.length; j++) {
                          if (elems[j] === filter[2]) {
                              elems.splice(j, 1);
                              if (! elems.length) {
                                  this.filters.splice(i, 1);
                              }
                              stat1 = false;
                              break;
                          } else {
                              stat1 = true;
                          }
                      }
                      if (stat1) {
                          (this.filters[i][2]).push(filter[2]);
                      }
                      stat2 = false;
                      break;
                  } else {
                      stat2 = true;
                  }
              }

              if (stat2) {
                  this.filters.push([filter[0], filter[1], [filter[2]]]);
              }

              if (this.filters.length) {
                  for (let i = 0; i < filters.length; i++) {
                      if (filters[i][2][1]) {
                          whereIn.push([filters[i][0], filters[i][2]]);
                      } else {
                          where.push([filters[i][0], filters[i][1], filters[i][2][0]]);
                      }
                  }

                  this.options.filter = [whereIn, where];
                  this.options.count = true;
              } else {
                  this.options.filter = undefined;
                  this.options.count = true;
              }

              this.requestData();
          }
        },
        created () {
            this.category();
        },
        watch: {
            '$route': function () {
              this.loadProduct = false;
              this.category();
            }
        },

    }
</script>

<style scoped>

</style>