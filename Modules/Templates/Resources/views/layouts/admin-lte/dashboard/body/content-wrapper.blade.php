<section class="content-header">
  
  @section('header')
  @show

  @include( $template_module_base_path . "body.partials.breadcrumb")
  
  @include( $template_module_base_path . "body.partials.status")

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      @yield('content')
    </div>
  </div>
</section>