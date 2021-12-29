<template>
    <div class="modal" tabindex="-1" id="ModalRole">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="store">
                        <div>
                            <label>Name</label>
                            <input class="form-control" type="text" v-model="role.name" required>
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
        props: ['role'],

        methods: {
            async store() {
                await axios.post(`/Role/update/${this.role.id}`, this.role).then(res => {
                    if (res.data.saved) {
                        alert('saved')
                    }
                })
            }
        }
    }
</script>
