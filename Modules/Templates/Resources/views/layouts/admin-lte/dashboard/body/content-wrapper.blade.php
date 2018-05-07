<section class="content-header">
  
  @section('header')
  @show

  @include("templates::layouts.admin-lte.dashboard.body.breadcrumb")
  
  @include("templates::layouts.admin-lte.dashboard.body.status")

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      @yield('content')
    </div>
  </div>
</section>