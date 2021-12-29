<template>
    <div class="modal" tabindex="-1" id="Modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="update">
                        <div>
                            <label>Name:</label>
                            <input class="form-control" type="text" v-model="user.name" required>
                        </div>
                        <div>
                            <label>Email:</label>
                            <input class="form-control" type="text" v-model="user.email" required>
                        </div>
                        <div>
                            <label>Role:</label>
                            <select v-model="role_id" class="form-control" required>
                                <option v-for="(role, index) in roles" :key="index" :value="role.id">{{ role.name }}</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['user', 'roles'],

        data() {
            return {
                role_id: ""
            }
        },

        methods: {
            async update(){
                await axios.post(`/Users/update/${this.user.id}/${this.role_id}`, this.user).then(res => {
                    if (res.data.updated) {
                        this.user = {};
                        $('#Modal').modal('toggle')
                    }
                })
            }
        }
    }
</script>
