<template>
    <section class="row">
        <div class="col-6">
            <img class="img-fluid rounded" :src="product.img_route">
        </div>
        <div class="col-6 mt-5">
            <div>
                <h1 class="text-center">{{ product.name }}</h1>
                <h2>By: {{ user.name }}</h2>
                <h3>Description:</h3>
                <p class="mt-2">{{ product.description }}</p>
            </div>
            <div>
                <h3>Left in stock:</h3>
                <label>{{ stock }}</label>
            </div>
            <form @submit.prevent="buy" class="form mt-4">
               <div>
                    <h3>ingese la cantidad que desea comprar:</h3>
                    <input v-model="cantidad" class="form-control" type="number" required>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary col-6" type="submit">Buy</button>
                </div>
            </form>

        </div>
    </section>
</template>
<script>
    export default {
        props: ['product', 'user'],

        data(){
            return {
                cantidad: {},
                stock: this.product.stock
            }
        },

        methods: {
             async buy() {
                if (this.cantidad <= this.product.stock) {
                    this.product.stock -= this.cantidad;
                    await axios.post(`/Product/update/${this.product.id}`, this.product).then(res => {
                        if (res.data.updated) {
                            this.stock = this.product.stock,
                            alert('producto comprado con exito')
                        }
                    })
                }else{
                    alert('No se cuentan con suficintes productos en stock')
                }
            }
        }
    }
</script>
