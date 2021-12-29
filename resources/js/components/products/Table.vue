<template>
    <section>
        <h1 class="text-center my-4">Products</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>Id</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Category id</th>
                <th>user</th>
            </thead>
            <tbody v-for="(user, index) in users">
                <tr v-for="(product, index) in user.products" :key="index">
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.stock }}</td>
                    <td>{{ product.category_id }}</td>
                    <td>{{ user.name }}</td>
                </tr>
            </tbody>
        </table>
    </section>
</template>
<script>
    export default {
        props: ['users']
    }
</script>
