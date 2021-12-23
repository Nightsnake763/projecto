<template>
    <section>
        <div v-for="(category, index) in categories" :key="index">
            <div class="d-flex text-center card mt-4">
                <div class="card-body">
                    <div>
                        <h1>{{ category.name }}</h1><hr>
                    </div>
                    <div>
                        <div v-for="(product, index) in category.products" :key="index">
                            <div class="card" style="width: 18rem;">
                                <img :src="`./img/${product.id}.jpg`" :alt="'image not found'" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ product.name }}</h5>
                                    <p class="card-text">{{ product.description }}</p>
                                    <a href="#" class="btn btn-primary">view product</a>
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
    export default {
        props: ['categories']
    }
</script>
