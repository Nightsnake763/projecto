require('./bootstrap');

import Vue from 'vue';
import Index from './components/Index';
import Users from "./components/Users";

new Vue({
    el: '#app',
    components: {
        Index,
        Users
    }
});
