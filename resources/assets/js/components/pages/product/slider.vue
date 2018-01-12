<template>
    <div class="product-slider">
        <div class="hv">First</div>
        <i class="btn-left ion-chevron-left hv"></i>
        <ul>
            <li class="p-page hv">1</li>
            <li class="p-page hv">2</li>
            <li class="p-page hv">3</li>
            <li class="p-page hv">4</li>
            <li class="p-page hv">5</li>
            <li class="p-page">...</li>
        </ul>
        <i class="btn-right ion-chevron-right hv"></i>
        <div class="hv">Last</div>
    </div>
</template>

<script>
    export default {
        name: "slider"
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

</style>