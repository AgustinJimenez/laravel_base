<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link href="{{ asset('css/admin-lte-resources.css') }}" rel="stylesheet">
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


@if( config('custom.template.black-skin') )
    <link href="{{ asset('css/admin-lte-custom-skin.css') }}" rel="stylesheet">
@endif

@section('styles')
@show

<script src="{{ asset('js/admin-lte-resources.js') }}" type="text/javascript" ></script>