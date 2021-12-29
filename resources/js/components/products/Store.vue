<template>
    <section>
        <div class="modal" tabindex="-1" id="Modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div v-if="(update)" class="modal-header">
                        <h5 class="modal-title text-center">Edit product</h5>
                    </div>
                    <div v-else class="modal-header">
                        <h5 class="modal-title text-center">Add product</h5>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="store" class="form">
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
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mt-5 col-6" required>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        props: ['categories', 'product', 'update'],

        methods: {
            async store(){
                if (this.update) {
                    await axios.post(`/Product/update/${this.product.id}`, this.product).then(res => {
                        if (res.data.updated) {
                            this.product = {},
                            $('#Modal').modal('toggle')
                        }
                    })
                }else {
                    await axios.post(`/Product/store/`, this.product).then(res => {
                        if (res.data.saved) {
                            this.$parent.all_products.push(this.product),
                            this.product = {},
                            $('#Modal').modal('toggle')
                        }
                    })
                }
            }
        }
    }
</script>
