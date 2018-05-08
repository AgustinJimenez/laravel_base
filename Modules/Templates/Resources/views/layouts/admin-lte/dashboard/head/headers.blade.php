<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link href="{{ asset('css/admin-lte/admin-lte-resources.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

@if( config('custom.template.black-skin') )
    <link href="{{ asset('css/admin-lte/admin-lte-custom-skin.css') }}" rel="stylesheet">
@endif

@section('styles')
@show

<script src="{{ asset('js/admin-lte/admin-lte-resources.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/app.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    var app = new App({csrf_token:'{{ csrf_token() }}'});
</script>
