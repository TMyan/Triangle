<template>
    <div class="slide" :class="{visible: load}">
        <div class="container style-flat">
            <div class="top">
                <div class="bottom">
                    <div class="tex">{{title}}</div>
                    <div class="slider-img" :style="{backgroundImage: image}"></div>
                    <div class="tex bottom">{{text}}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "slider",
        data () {
          return {
             title: '',
             text: '',
             image: '',
             length: '',
             load: false,
             lang: this.$store.state.language,
             ite: 0,
          }
        },
        props: {
            slide: {
                type: Array,
                default: []
            },
        },
        watch : {
            slide: function (value) {
                if (value.length){
                    this.showSlider()
                    this.length = value.length;
                    this.slider()
                    setInterval(() => {
                        this.slider()
                    }, 7000);
                }
            }
        },
        methods: {
           showSlider () {
               this.load = true;
           },
           slider () {
               let elem = this.slide[this.ite];
               this.title = elem.title;
               this.text = elem.text;
               this.image = "url(../images/" + elem.image + ")";
               if (this.ite < this.length - 1) {
                   this.ite++
               }  else {
                   this.ite = 0;
               }
           }
        }
    }
</script>

<style scoped>
  .visible {
      display: block;
  }
</style>