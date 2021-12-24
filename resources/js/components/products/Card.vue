<template>
    <div>
        <img :src="product.img_route" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{ product.short_name }}</h5>
            <p class="card-text">{{ product.short_descript }}</p>
            <a :href="`/Product/buy_view/${product.id}`" class="btn btn-primary">view product</a>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['product']
    }
</script>
