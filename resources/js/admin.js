
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require("@babel/polyfill");
require('./bootstrap');


/*
 * Vue and VueRouter
 */
window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// CKEditor
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );



/**
 * Vuetufy, fortawesome, materiial icons, material-design-icons
 */
//import '@fortawesome/fontawesome-free/css/all.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
//import '@mdi/font/css/materialdesignicons.css'

var Vuetify = require('vuetify');
Vue.use(Vuetify);
import 'vuetify/dist/vuetify.min.css';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('toolbar', require('./components/admin/Toolbar.vue').default);
Vue.component('content-main', require('./components/admin/ContentMain.vue').default);
Vue.component('realties', require('./components/admin/Realties.vue').default);
Vue.component('content-to-edit', require('./components/admin/ContentToEdit.vue').default);



// Localization
window.trans = (string) => _.get(window.i18n, string);
Vue.prototype.trans = string => _.get(window.i18n, string);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    { 
      path: '', 
      component: require('./components/admin/Realties.vue').default 
    },
    { 
      path: '/content-to-edit', 
      component: require('./components/admin/ContentToEdit.vue').default 
    }
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    el: '#app',
    router,
    data: {}
    
}).$mount('#app');


$(document).ready(function() {   

});




