@if( request()->ajax() )
    @include('templates::layouts.admin-lte.dashboard.body.content-wrapper')
@else
    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            @include('templates::layouts.admin-lte.dashboard.head.headers')     
        </head>
        <body  class="hold-transition {{ env('ADMIN_LTE_SKIN', 'sidebar-mini') }} {{ env('ADMIN_LTE_LAYOUT_OPTIONS', 'skin-blue') }}">
            <div class="wrapper">
                @include('templates::layouts.admin-lte.dashboard.body.main-header')                        


                @include('templates::layouts.admin-lte.dashboard.body.main-sidebar')                        
                
                <div class="content-wrapper" id="template-content-container">
                    @include('templates::layouts.admin-lte.dashboard.body.content-wrapper')       
                </div>                 
                

                @include('templates::layouts.admin-lte.dashboard.body.main-footer')                        
                

                @include('templates::layouts.admin-lte.dashboard.body.control-sidebar')                        
                

                <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            </div>

            @include('templates::layouts.admin-lte.dashboard.modal') 
            @include('templates::layouts.admin-lte.dashboard.body.scripts')                        
            
            
        </body>

        
    </html>


@endif
