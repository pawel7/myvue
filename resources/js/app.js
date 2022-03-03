require('./bootstrap');
import Vue from 'vue';

window.Vue = require("vue").default;

Vue.component('front-page', require('./components/Front.vue').default);

Vue.component('post-create', require('./components/PostCreate.vue').default);

const app = new Vue({
    el: '#app',
});
