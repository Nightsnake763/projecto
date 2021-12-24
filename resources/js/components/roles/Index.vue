<template>
    <section>
        <store></store>
        <role-table :roles="all_roles" />
    </section>
</template>
<script>
    import Store from "./Store";
    import RoleTable from "./Table";

    export default {
        props: ['roles'],

        components: {
            Store,
            RoleTable
        },

        data() {
            return {
                all_roles: this.roles
            }
        }
    }
</script>
