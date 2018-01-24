<template>
    <div class="product container" id="product">
        <spinner v-if="spinnerPage" size="big" message="Loading..." line-fg-color="#000000"></spinner>
        <div v-if="loadPage" :class="{hide: $route.params.product}" class="row">
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
                <div v-if="spinnerProduct" class="sr">
                    <spinner size="big" class="sf" message="Loading..." line-fg-color="#000000"></spinner>
                </div>
                <div v-if="loadProduct">
                    <div class="row">
                        <div v-for="product in response.data" class="col-lg-4 col-md-6 col-sm-6  product-elem">
                            <div class="p-photo" :style="{backgroundImage: 'url(/../images/products/' + product.photo + ')'}"></div>
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
                               <router-link :to="categoryPath + '/product_' + product.id" class="nta"><span class="p-more">More</span></router-link>
                            </div>
                            <div class="p-vote">
                                <span class="p-like ion-thumbsup"><sub>{{product.likes}}</sub></span>
                                <span class="p-notLike ion-thumbsdown"><sub>{{product.dislikes}}</sub></span>
                            </div>
                        </div>
                    </div>
                    <slider v-if="response.count" :count="response.count" :page="slider.activePage" :skip="slider.skipSlider" @page="page"></slider>
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    import Spinner from 'vue-simple-spinner'
    import Slider from './slider'
    export default {
        name: "product",
        components: {
          Spinner,
          Slider
        },
        data () {
            return {
                options: {
                        count: false,
                        page: undefined,
                        filter: undefined
                },
                response: {
                    data: {},
                    filters: {},
                    count: undefined
                },
                slider: {
                    activePage: 1,
                    skipSlider: 0
                },
                spinnerPage: true,
                visited: false,
                spinnerProduct: true,
                categoryPath: undefined,
                loadPage: false,
                loadProduct: false,
                filters: [],
            }
        },
        methods: {
          resetData () {
             this.options = {
                 count: false,
                 page: undefined,
                 filter: undefined
             };
             this.response = {
                 data: {},
                 filters: {},
                 count: undefined
             };
             this.slider = {
                  activePage: 1,
                  skipSlider: 0
             };
             this.spinnerPage = true;
             this.spinnerProduct = true;
             this.loadPage = false;
             this.loadProduct = false;
             this.filters = [];
          },
          category (path) {
              axios.post(path)
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
              if (! this.options.page) {
                  this.slider.activePage = 1;
              }

              axios.post(this.$route.path, request)
                   .then(response => {
                      this.loadProduct = true;
                      this.spinnerProduct = false;
                      this.response.data = response.data.data;
                      if (response.data.count !== null) {
                          this.response.count = response.data.count;
                      }
                   })
                   .catch(response => {
                       this.spinnerProduct = false;
                       console.log(response)
                   });

          },
          page (page, skip) {
             this.options.page = page;
             this.slider.activePage = page;
             this.slider.skipSlider = skip;
             this.requestData();
             this.options.page = undefined;
          },
          productFilter (filter, event) {
              this.active(event);
              this.slider = {
                  activePage: 1,
                  skipSlider: 0
              };
              let filters = this.filters;
              let where = [];
              let whereIn = [];
              let stat2 = true;
              for (let i = 0; i < filters.length; i++) {
                  if (filters[i][0] === filter[0]) {
                      let elems = filters[i][2];
                      let stat1 = false;
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
              this.options.count = false;
          }
        },
        created () {
            if (this.$route.params.product) {
                this.spinnerPage = false;
            } else {
                this.visited = true;
                this.categoryPath = this.$route.path;
                this.category(this.$route.path);
            }
        },
        beforeRouteUpdate (to, from, next) {
            if (to.params.category !== from.params.category){
                this.loadProduct = false;
                this.resetData();
                this.category(to.path);
                this.categoryPath = to.path;
            } else {
                if (! this.visited) {
                    this.visited = true;
                    this.spinnerPage = true;
                    this.category(to.path);
                }
            }
            next();
        },

    }
</script>

<style scoped>
  .sr {
      width: 100%;
      height: 7rem;
      padding-left: 40%;
  }
  .sf {
      position: fixed;
  }

  .nta:hover {
      text-decoration: none;
  }

  .nta {
      color: gray;
  }

  .hide {
      display: none;
  }
</style>