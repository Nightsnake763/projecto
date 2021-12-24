require('./bootstrap');

import Vue from 'vue';
import Index from './components/Index';
import EditUsers from "./components/users/Edit";
import StoreProducts from "./components/products/Store";
import IndexRole from "./components/roles/Index";
import IndexCategory from "./components/categories/Index";
import BuyProduct from "./components/products/Buy";
import ViewCategory from "./components/categories/View";

new Vue({
    el: '#app',
    components: {
        Index,
        EditUsers,
        StoreProducts,
        IndexRole,
        IndexCategory,
        BuyProduct,
        ViewCategory
    }
});
