/*
    first install bower dependecies at node_modules/admin-lte and then run -gulp

*/

var gulp = require('gulp');
var concat = require('gulp-concat')
var uglify = require('gulp-uglify')
var minifyCSS = require('gulp-minify-css')
var strip = require('gulp-strip-comments');

var base_path = './node_modules/';
var bower_path = base_path + 'admin-lte/bower_components/';


gulp.task('compile_css', function() {


    return gulp.src(
            [
                bower_path + 'bootstrap/dist/css/bootstrap.min.css',
                bower_path + 'font-awesome/css/font-awesome.min.css',
                bower_path + 'ionicons/css/ionicons.min.css',
                base_path + 'admin-lte/dist/css/AdminLTE.min.css',
                base_path + 'admin-lte/dist/css/skins/_all-skins.min.css',
                bower_path + 'morris.js/morris.css',
                bower_path + 'jvectormap/jquery-jvectormap.css',
                bower_path + 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
                bower_path + 'bootstrap-daterangepicker/daterangepicker.css',
                base_path + 'admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
                bower_path + 'datatables.net-bs/css/dataTables.bootstrap.min.css'
            ]
        )
        .pipe(concat('css/admin-lte-resources.css'))
        .pipe(gulp.dest('public'));

});

gulp.task('compile_js', function() {


    return gulp.src(
            [
                base_path + 'jquery/dist/jquery.min.js',
                bower_path + 'jquery-ui/jquery-ui.min.js',
                base_path + 'bootstrap/dist/js/bootstrap.min.js',
                base_path + 'raphael/raphael.min.js',
                base_path + 'morris.js/morris.min.js',
                base_path + 'jquery-sparkline/dist/jquery.sparkline.min.js',
                base_path + "admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
                base_path + "admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
                base_path + "jquery-knob/dist/jquery.knob.min.js",
                base_path + "moment/min/moment.min.js",
                base_path + "bootstrap-daterangepicker/daterangepicker.js",
                base_path + "bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
                base_path + "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
                base_path + "jquery-slimscroll/jquery.slimscroll.min.js",
                base_path + 'fastclick/lib/fastclick.js',
                base_path + 'admin-lte/dist/js/adminlte.min.js'
            ]
        )
        .pipe(concat('js/admin-lte-resources.js'))
        .pipe(gulp.dest('public'))
        .pipe(strip());

});



gulp.task('default', ['compile_js', 'compile_css']);
/*
base_url('public/css/bootstrap.min.css'),
base_url('public/css/font-awesome.min.css'),
base_url('public/css/ionicons.min.css'),
base_url('public/css/dataTables.bootstrap.min.css'),
base_url('public/css/AdminLTE.min.css'),
base_url('public/css/skin-blue.min.css'),
base_url('public/css/app.css'),
*/