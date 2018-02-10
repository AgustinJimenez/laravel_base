<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @component('layouts.admin-lte.head.headers')                        
    @endcomponent
</head>
<!--
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body  class="hold-transition {{ env('ADMIN_LTE_SKIN', 'sidebar-mini') }} {{ env('ADMIN_LTE_LAYOUT_OPTIONS', 'skin-blue') }}">
    <div class="wrapper">
        @component('layouts.admin-lte.body.main-header')                        
        @endcomponent

        @component('layouts.admin-lte.body.main-sidebar')                        
        @endcomponent

        @component('layouts.admin-lte.body.content-wrapper')                        
        @endcomponent

        @component('layouts.admin-lte.body.main-footer')                        
        @endcomponent

        @component('layouts.admin-lte.body.control-sidebar')                        
        @endcomponent

        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @component('layouts.admin-lte.body.scripts')                        
    @endcomponent
    
</body>

    
</html>