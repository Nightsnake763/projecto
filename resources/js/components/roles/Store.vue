<template>
    <section>
        <div class="text-center">
            <h1>Add Role</h1>
        </div>
        <form @submit.prevent="store" class="form">
            <div>
                <label>Name:</label>
                <input v-model="role.name" class="form-control" type="text">
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
                role: {}
            }
        },

        methods: {
            async store() {
                await axios.post('/Role/store', this.role).then(res => {
                    if (res.data.saved) {
                        this.role.id = res.data.id,
                        this.$parent.all_roles.push(this.role),
                        this.role = {}
                    }
                });
            }
        }
    }
</script>
