<template>
   <div>
      <spinner v-if="spinner" size="big" message="Loading..." line-fg-color="#000000"></spinner>
      <div v-if="loadProduct">
         <div class="row">
            <div class="col-lg-7">
               <div class="p-slide">
                  <div id="example">
                     <carousel-3d :perspective="0" :space="400" :display="3">
                        <slide v-for="(photo, i) in response.photos" :index="i" :key="i">
                           <div class="sde" :style="{backgroundImage: 'url(/../images/products/' + photo + ')'}"></div>
                        </slide>
                     </carousel-3d>
                  </div>
               </div>
            </div>
            <div class="col-lg-5">
               <div class="basic-block">
                  <div class="basic-p">
                     <p v-for="(base, key) in response.basic">{{key}}-{{base}}</p>
                     <div>
                        <div class="add-cart-btn">
                           <span>Add to</span>
                           <span><i class="ion-android-cart"></i></span>
                        </div>
                        <div class="medium-block-btn" :class="{sta: moreOptions}" @click="more">More</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-7 medium-block">
               <div v-show="moreOptions" class="med-option">
                  <div v-for="(group, key) in response.all" class="med-group">
                     <div class="gr">{{key}}</div>
                     <div class="med-gop">
                        <table class="med-table">
                           <tr v-for="(option,key) in group">
                              <td class="mtw1">{{key}}</td>
                              <td class="mtw2">{{option}}</td>
                           </tr>
                        </table>
                     </div>
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
        name: "product-details",
        components: {
            Spinner
        },
        data () {
            return {
                spinner: true,
                loadProduct: false,
                moreOptions: false,
                response: {}
            }
        },
        methods: {
          more () {
              if (this.moreOptions) {
                  this.moreOptions = false;
              } else {
                  this.moreOptions = true;
              }
          }
        },
        created () {
            axios.post(this.$route.path)
                .then(response => {
                    this.response = response.data;
                    this.spinner = false;
                    this.loadProduct = true;

                })
                .catch(response => {
                    this.spinner = false;
                    console.log(response)
                });
        }
    }
</script>

<style scoped lang="scss">
   .carousel-3d-container {
      .carousel-3d-slide {
         padding: 20px;

      .title { font-size: 22px; }
      }
   }

   .sde {
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 100%;
   }

   .sta {
      background-color: #39ec57;
   }
</style>