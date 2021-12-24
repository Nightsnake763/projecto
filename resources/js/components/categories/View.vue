<template>
    <section>
        <div class="mt-4 text-center">
            <h1>{{ category.name }}</h1><hr>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-4" v-for="(product, index) in products" :key="index">
                    <div class="card mx-2 mb-4" style="width: auto;">
                        <card :product="product"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import Card from "../products/Card";

    export default {
        props: ['category', 'products'],

        components: {
            Card
        },
    }
</script>
