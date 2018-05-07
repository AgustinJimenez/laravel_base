@php( $template_module_base_path = 'templates::layouts.admin-lte.dashboard.' ) 

@if( !request()->ajax() )
    <!DOCTYPE html>
    
    <html lang="{{ app()->getLocale() }}">
      
        <head>
      
            @include( $template_module_base_path . 'head.headers')     
      
        </head>
      
        <body  class="hold-transition {{ config('config.sidebar-type', 'sidebar-mini') }} {{ config('custom.template.skin', 'skin-blue') }}">
      
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