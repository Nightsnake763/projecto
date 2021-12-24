<template>
    <section>
        <store></store>
        <category-table :categories="all_categories" />
    </section>
</template>
<script>
    import Store from "./Store";
    import CategoryTable from "./Table";

    export default {
        props: ['categories'],

        components: {
            Store,
            CategoryTable
        },

        data() {
            return {
                all_categories: this.categories
            }
        }
    }
</script>
