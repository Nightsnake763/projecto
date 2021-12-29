<template>
    <section>
        <div class="my-4 d-flex  justify-content-between align-items-between">
            <h1>My Products</h1>
            <a class="btn btn-primary" @click="store">Add product</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <th>Nombre</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <tr v-for="(product, index) in all_products" :key="index">
                    <td>{{ product.name }}</td>
                    <td>{{ product.stock }}</td>
                    <td>{{ categories[product.category_id - 1].name }}</td>
                    <td>
                        <a class="btn btn-warning" @click="editProduct(product)">Edit</a>
                        <a class="btn btn-danger" @click="deleteProduct(product, index)">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <store :product="product" :categories="categories" :update="update"/>
    </section>
</template>
<script>
    import Store from "../products/store";

    export default {
        props: ['products', 'categories'],

        data() {
            return {
                product: {},
                all_products: this.products,
                update: false
            }
        },

        components: {
            Store
        },

        methods: {
            async store() {
                this.update = false;
                this.product = {};
                $('#Modal').modal('show')
            },

            async editProduct(selected_product) {
                this.update = true;
                this.product = selected_product;
                $('#Modal').modal('show')
            },

            async deleteProduct(product, index) {
                await axios.delete(`/Product/delete/${product.id}`).then(res => {
                    if (res.data.deleted) {
                        this.all_products.splice(index, 1)
                    }
                })
            }
        },
    }
</script>
