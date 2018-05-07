@if( request()->ajax() )
    @include('templates::layouts.admin-lte.dashboard.body.content-wrapper')
@else
    <!DOCTYPE html>
    
    <html lang="{{ app()->getLocale() }}">
      
        <head>
      
            @include('templates::layouts.admin-lte.dashboard.head.headers')     
      
        </head>
      
        <body  class="hold-transition {{ config('sidebar-type', 'sidebar-mini') }} {{ config('template.skin', 'skin-blue') }}">
      
            <div class="wrapper">

                @include('templates::layouts.admin-lte.dashboard.body.main-header')                        


                @include('templates::layouts.admin-lte.dashboard.body.main-sidebar')                        
                
                <div class="content-wrapper" id="template-content-container">
                    @include('templates::layouts.admin-lte.dashboard.body.content-wrapper')       
                </div>                 
                
                @include('templates::layouts.admin-lte.dashboard.body.main-footer')                        
                
                @include('templates::layouts.admin-lte.dashboard.body.control-sidebar')                        
                
                <div class="control-sidebar-bg"></div>
            
            </div>

            @include('templates::layouts.admin-lte.dashboard.body.scripts')                        
            
        </body>
        
    </html>

@endif