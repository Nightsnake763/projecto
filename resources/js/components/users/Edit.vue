<template>
    <section>
        <h1>Users</h1>
        <table class="table">
            <thead class="thead-dark">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <tr  v-for="(user, index) in users" :key="index">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ roles[user.role - 1].name }}</td>
                    <td>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a @click.prevent="deleteUser(user, index)" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>
<script>
    export default {
        props: ['users' , 'roles'],

        methods: {
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
