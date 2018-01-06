<template>
    <div class="maps">
        <div id="mapTriangle" class="googleMap"></div>
    </div>
</template>

<script>
    export default {
        name: "maps",
        data: function () {
            return {
                map: '',
                marker: {}
            }
        },
        props: {
            latitude: Number,
            longitude: Number
        },
        computed: {
            mapMarkers: function () {
                return this.markers
            }
        },
        mounted: function () {
            const element = document.getElementById('mapTriangle')
            const options = {
                zoom: 14,
                center: new google.maps.LatLng(this.latitude, this.longitude)
            }
            this.map = new google.maps.Map(element, options)
            const position = new google.maps.LatLng(this.latitude, this.longitude)
            this.marker.map = this.map
            this.marker.position = position
            new google.maps.Marker(this.marker)
        },
    }
</script>

<style scoped>
   .googleMap {
       width:100%;
       height:400px !important;
   }
</style>