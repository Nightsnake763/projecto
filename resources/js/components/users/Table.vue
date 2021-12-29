<template>
    <section>
        <h1 class="text-center mb-5">Users</h1>
        <table class="table">
            <thead class="thead-dark">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </thead>
            <tbody  v-for="(role, index) in roles" :key="index">
                <tr v-for="(user, index2) in role.users" :key="index2">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ role.name }}</td>
                    <td>
                        <a @click="(editUser(user))" class="btn btn-warning">Edit</a>
                        <a @click.prevent="deleteUser(user, index2)" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <modal :user="user" :roles="roles"/>
    </section>
</template>
<script>
    import Modal from "./Modal";

    export default {
        props: ['roles'],

        data() {
            return{
                user: {}
            }
        },

        components: {
            Modal
        },

        methods: {
            async editUser(user) {
                this.user = user,
                $("#Modal").modal('show')
            },

            async deleteUser(user, index) {
                await axios.delete(`/Users/delete/${user.id}`).then(res => {
                    if (res.data.deleted) {
                        console.log(res.data.product)
                        alert('deleted')
                    }
                });
            }
        }
    }
</script>
