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
                        <form @submit.prevent="store" class="form" enctype="multypatmultipart/form-data">
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
                                <label>Image: </label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div v-if="(update)" class="custom-file">
                                    <input type="file" class="custom-file-input" ref="myFiles" v-on:change="setImage" id="file" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                                <div v-else class="custom-file">
                                    <input type="file" class="custom-file-input" ref="myFiles" v-on:change="setImage" id="file" aria-describedby="inputGroupFileAddon01" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
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

        data() {
            return {
                imagen: null
            }
        },

        methods: {
            async store(){
                if (this.update) {
                    const fd = new FormData();

                    fd.append('name', this.product.name);
                    fd.append('description', this.product.description);
                    fd.append('stock', this.product.stock);
                    fd.append('category_id', this.product.category_id);
                    fd.append('image', this.imagen);

                    await axios.post(`/Product/update/${this.product.id}`, fd).then(res => {
                        if (res.data.updated) {
                            this.product = {},
                            $('#Modal').modal('toggle')
                        }
                    })
                }else {
                    const fd = new FormData();

                    fd.append('name', this.product.name);
                    fd.append('description', this.product.description);
                    fd.append('stock', this.product.stock);
                    fd.append('category_id', this.product.category_id);
                    fd.append('image', this.imagen);

                    await axios.post(`/Product/store/`, fd).then(res => {
                        if (res.data.saved) {
                            this.$parent.all_products.push(this.product),
                            this.product = {},
                            $('#Modal').modal('toggle')
                        }
                        console.log(res)
                    })
                }
            },

            setImage(event) {
                this.imagen = event.target.files[0],
                console.log(this.imagen)
            }
        }
    }
</script>
