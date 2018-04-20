<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link href="{{ asset('css/admin-lte-resources.css') }}" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->                   

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



<style>
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-BoldItalic.ttf")}}'); }
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-ExtraLight.ttf")}}'); }   
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-Light.ttf")}}'); }           
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-SemiBold.ttf")}}'); }
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-BlackItalic.ttf")}}'); }  
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-Bold.ttf")}}'); }              
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-Italic.ttf")}}'); }       
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-Regular.ttf")}}'); }
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-Black.ttf")}}'); }        
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-ExtraLightItalic.ttf")}}'); }  
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-LightItalic.ttf")}}'); }  
    @font-face { /*font-family: "Source_Sans_Pro"; */src: url('{{asset("fonts/Source_Sans_Pro/SourceSansPro-SemiBoldItalic.ttf")}}'); }
</style>

<!-- Styles -->

{{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
--}}

@if( env('ADMIN_LTE_ENABLE_BLACK_SKIN') )
    <link href="{{ asset('css/admin-lte-custom-skin.css') }}" rel="stylesheet">
@endif

@section('styles')
@show
