<template>
    <section>
        <h1>Actual Roles</h1>
        <table class="table mt-4">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </thead>
            <tbody v-for="(role, index) in roles" :key="index">
                <td>{{ role.id }}</td>
                <td>{{ role.name }}</td>
                <td>
                    <a class="btn btn-warning" @click="edit(role)">Edit</a>
                    <a class="btn btn-danger" @click.prevent="deleteRole(role.id, index)">Delete</a>
                </td>
            </tbody>
        </table>

        <edit :role="selected_role"></edit>
    </section>
</template>
<script>
    import Edit from "./Modal";

    export default {
        props: ['roles'],

        data() {
            return {
                selected_role: {}
            }
        },

        components: {
            Edit
        },

        methods: {
            async edit(role) {
                this.selected_role = role,
                $('#ModalRole').modal('show')
            },

            async deleteRole(id, index){
                await axios.delete(`/Role/delete/${id}`).then(res => {
                    if (res.data.deleted) {
                        this.$parent.all_roles.splice(index, 1)
                    }
                });
            }
        }
    }
</script>
