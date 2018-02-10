
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
var base_path = './../../../node_modules/';
var admin_lte = base_path + 'admin-lte/';
var bower_path = admin_lte + 'bower_components/';

//require('./bootstrap');
require( 
bower_path + 'jquery/dist/jquery.min.js',
bower_path + 'jquery-ui/jquery-ui.min.js',
bower_path + 'bootstrap/dist/js/bootstrap.min.js',
bower_path + 'raphael/raphael.min.js',
bower_path + 'morris.js/morris.min.js',
bower_path + 'jquery-sparkline/dist/jquery.sparkline.min.js',
base_path + "plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
base_path + "plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
bower_path + "jquery-knob/dist/jquery.knob.min.js",
bower_path + "moment/min/moment.min.js",
bower_path + "bootstrap-daterangepicker/daterangepicker.js",
bower_path + "bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
base_path + "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
base_path + "jquery-slimscroll/jquery.slimscroll.min.js",
bower_path + 'fastclick/lib/fastclick.js',
base_path + 'admin-lte/dist/js/adminlte.min.js'
);

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
