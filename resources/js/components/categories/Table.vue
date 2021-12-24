<template>
    <section>
        <h1>Actual Categories</h1>
        <table class="table mt-4">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </thead>
            <tbody v-for="(category, index) in categories" :key="index">
                <td>{{ category.id }}</td>
                <td>{{ category.name }}</td>
                <td>
                    <a class="btn btn-warning" @click="edit(category)">Edit</a>
                    <a class="btn btn-danger" @click.prevent="deleteCategory(category.id, index)">Delete</a>
                </td>
            </tbody>
        </table>

        <edit :category="selected_category"></edit>
    </section>
</template>
<script>
    import Edit from "./Edit";

    export default {
        props: ['categories'],

        data() {
            return {
                selected_category: {}
            }
        },

        components: {
            Edit
        },

        methods: {
            async edit(category) {
                this.selected_category = category,
                $('#ModalCategory').modal('show')
            },

            async deleteCategory(id, index){
                await axios.delete(`/Category/delete/${id}`).then(res => {
                    if (res.data.deleted) {
                        this.$parent.all_categories.splice(index, 1)
                    }
                });
            }
        }
    }
</script>
