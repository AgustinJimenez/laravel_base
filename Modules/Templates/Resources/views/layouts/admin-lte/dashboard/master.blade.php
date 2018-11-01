@php( $template_module_base_path = 'templates::layouts.admin-lte.dashboard.' ) 

@if( !request()->ajax() )

    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>{{ config('app.name', 'Laravel') }}</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- ADMIN-LTE-CSS -->
            <link href="{{ asset('css/admin-lte/admin-lte-resources.min.css') }}" rel="stylesheet">

            @if( config('custom.template.black-skin') )
                <link href="{{ asset('css/admin-lte/admin-lte-custom-skin.css') }}" rel="stylesheet">
            @endif

            @section('styles')
            @show
            <!-- ADMIN-LTE-JS -->
            <script src="{{ asset('js/admin-lte/admin-lte-resources.min.js') }}" type="text/javascript" charset="utf-8"></script>

            <!-- APP-CSS -->
            <script src="{{ asset('js/admin-lte/app.min.js') }}" type="text/javascript" charset="utf-8"></script>
            <script type="text/javascript" charset="utf-8">
                var app = new App({csrf_token:'{{ csrf_token() }}'});
            </script> 
      
        </head>
      
        <body class="hold-transition {{ config('config.sidebar-type', 'sidebar-mini') }} {{ config('custom.template.skin', 'skin-blue') }}">
      
            <div class="wrapper">

                @include( $template_module_base_path . 'body.main-header')                        


                @include( $template_module_base_path . 'body.main-sidebar')                        
                
                <div class="content-wrapper" id="template-content-container">
                    @include( $template_module_base_path . 'body.content-wrapper')       
                </div>                 
                
                @include( $template_module_base_path . 'body.main-footer')                        
                
                @include( $template_module_base_path . 'body.control-sidebar')                        
                
                <div class="control-sidebar-bg"></div>
            
            </div>

            @include( $template_module_base_path . 'body.scripts')                        
            
        </body>
        
    </html>

@else
    @include( $template_module_base_path . 'body.content-wrapper')
@endif