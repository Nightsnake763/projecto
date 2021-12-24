<template>
    <section>
        <h1 class="text-centered">Add Product</h1>
        <form @submit.prevent="store" class="form mt-5">
            <div>
                <label>Name:</label>
                <input v-model="product.name" class="form-control" type="text" required>
            </div>
            <div>
                <label for="">Desription:</label>
                <textarea v-model="product.description" class="form-control" required></textarea>
            </div>
            <div>
                <label>Category:</label>
                <select v-model="product.category_id" class="form-control" required>
                    <option v-for="(category, index) in categories" :key="index" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
            <div>
                <label>Stock:</label>
                <input v-model="product.stock" class="form-control" type="number" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-5" required>Save</button>
            </div>
        </form>
    </section>
</template>
<script>
    export default {
        props: ['id', 'categories'],

        data() {
            return {
                product: {}
            }
        },

        methods: {
            async store(){
                await axios.post(`/Product/store/${this.id}`, this.product, this.id).then(res => {
                    if (res.data.saved) {
                        this.product = {},
                        alert('Product saved')
                    }
                }).catch(err => {
                    alert('talvez la description sea muy larga')
                });
            }
        }
    }
</script>
