<template>
    <section>
        <div class="text-center">
            <h1>Add Category</h1>
        </div>
        <form @submit.prevent="store" class="form">
            <div>
                <label>Name:</label>
                <input v-model="category.name" class="form-control" type="text" required>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary btn-lg mt-4" type="submit">Save</button>
            </div>
        </form>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                category: {}
            }
        },

        methods: {
            async store() {
                await axios.post('/Category/store', this.category).then(res => {
                    if (res.data.saved) {
                        this.category.id = res.data.id,
                        this.$parent.all_categories.push(this.category),
                        this.category = {}
                    }
                });
            }
        }
    }
</script>
