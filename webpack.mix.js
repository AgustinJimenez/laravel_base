let mix = require('laravel-mix');

let base_path = './node_modules/';

    mix.scripts
    ([
        base_path + 'jquery/dist/jquery.min.js',
        base_path + 'jquery-ui-dist/jquery-ui.min.js',
        base_path + 'bootstrap/dist/js/bootstrap.min.js',
        base_path + 'raphael/raphael.min.js',
        base_path + 'morris.js/morris.min.js',
        base_path + 'jquery-sparkline/jquery.sparkline.min.js',
        base_path + "admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
        base_path + "admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
        base_path + "jquery-knob/dist/jquery.knob.min.js",
        base_path + "moment/min/moment.min.js",
        base_path + "bootstrap-daterangepicker/daterangepicker.js",
        base_path + "bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
        base_path + "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",//buscar
        base_path + "jquery-slimscroll/jquery.slimscroll.min.js",//buscar
        base_path + 'fastclick/lib/fastclick.js',
        base_path + 'admin-lte/dist/js/adminlte.min.js',
        base_path + 'admin-lte/plugins/iCheck/icheck.min.js',
        //base_path + 'datatables.net-bs/js/dataTables.bootstrap.js',
        base_path + 'dropzone/dist/min/dropzone.min.js',
        base_path + 'datatables.net/js/jquery.dataTables.js',
        base_path + 'jquery-confirm/js/jquery-confirm.js'

    ], 'public/js/admin-lte-resources.js')

    .mix.babel(['./resources/assets/js/custom.js'], 'public/js/custom.min.js')

    .styles
    ([
        base_path + 'bootstrap/dist/css/bootstrap.min.css',
        base_path + 'font-awesome/css/font-awesome.min.css',
        base_path + 'ionicons/dist/css/ionicons.min.css',
        base_path + 'admin-lte/dist/css/AdminLTE.min.css',
        base_path + 'admin-lte/dist/css/skins/_all-skins.min.css',
        base_path + 'morris.js/morris.css',
        base_path + 'jvectormap/jquery-jvectormap.css',
        base_path + 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        base_path + 'bootstrap-daterangepicker/daterangepicker.css',
        base_path + 'admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        base_path + 'datatables.net-bs/css/dataTables.bootstrap.css',
        base_path + 'jquery-confirm/css/jquery-confirm.css',
        base_path + 'dropzone/dist/min/dropzone.min.css',
        base_path + 'admin-lte/plugins/iCheck/flat/_all.css'
        
    ], 'public/css/admin-lte-resources.css')
    .copy(base_path + 'icheck/skins/flat/blue.png', 'public/css/blue.png')
    .copy(base_path + 'icheck/skins/flat/blue@2x.png', 'public/css/blue@2x.png');

    mix.js('resources/assets/js/app.js', 'public/js/');