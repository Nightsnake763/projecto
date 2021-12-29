require('./bootstrap');

import Vue from 'vue';
import Index from './components/Index';
import EditUsers from "./components/users/Table";
import IndexRole from "./components/roles/Index";
import IndexCategory from "./components/categories/Index";
import BuyProduct from "./components/products/Buy";
import ViewCategory from "./components/categories/View";
import ViewProducts from "./components/products/table";
import MyProducts from "./components/users/MyProducts";

new Vue({
    el: '#app',
    components: {
        Index,
        EditUsers,
        IndexRole,
        IndexCategory,
        BuyProduct,
        ViewCategory,
        ViewProducts,
        MyProducts
    }
});
