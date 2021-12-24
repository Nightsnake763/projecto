<template>
    <section>
        <div v-for="(category, index) in categories" :key="index">
            <div class="d-flex text-center card mt-4">
                <div class="card-body">
                    <div>
                        <a class="text-decoration-none" :href="`/Index/${category.id}`"><h1>{{ category.name }}</h1></a><hr>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-4" v-for="(product, index) in category.products" :key="index">
                                <div v-if="index < 6" class="card mx-2 mb-4" style="width: auto;">
                                    <card :product="product"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Card from "./products/Card";

    export default {
        props: ['categories'],

        components: {
            Card
        },
    }
</script>
