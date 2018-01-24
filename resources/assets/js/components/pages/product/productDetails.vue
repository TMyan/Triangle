<template>
   <div>
      <spinner v-if="spinner" size="big" message="Loading..." line-fg-color="#000000"></spinner>
      <div v-if="loadProduct">
         <div class="row">
            <div class="col-lg-7">
               <div class="p-slide"></div>
            </div>
            <div class="col-lg-5">
               <div class="basic-block">
                  <div class="basic-p">
                     <p v-for="(base, key) in response.basic">{{key}}-{{base}}</p>
                     <div class="add-cart-btn">
                        <span>Add to</span>
                        <span><i class="ion-android-cart"></i></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-7 medium-block">
               <div class="medium-block-btn">More</div>
               <div class="med-option">
                  <div v-for="(group, key) in response.more" class="med-group">
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
                response: {}
            }
        },
        methods: {
          hideProducts (status) {
              this.$emit('product', status);
          }
        },
        created () {
            this.hideProducts(true);
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

<style scoped>

</style>