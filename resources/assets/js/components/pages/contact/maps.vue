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
                markers: [
                    {
                        position: {
                            latitude: 59.93,
                            longitude: 30.32
                        }
                    },
                    {
                        position: {
                            latitude: 59.928,
                            longitude: 30.32
                        }
                    }
                ]
            }
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
                center: new google.maps.LatLng(59.93, 30.32)
            }
            this.map = new google.maps.Map(element, options)

            this.markers.forEach((marker) => {
                const position = new google.maps.LatLng(marker.position.latitude, marker.position.longitude)
                marker.map = this.map
                marker.position = position
                new google.maps.Marker(marker)
            })
        },
    }
</script>

<style scoped>
   .googleMap {
       width:100%;
       height:400px !important;
   }
</style>