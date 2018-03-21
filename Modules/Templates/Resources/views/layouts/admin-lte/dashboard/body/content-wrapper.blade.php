<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">

      @section('header')
      @show

      @include("templates::layouts.admin-lte.dashboard.body.breadcrumb")
      
      @include("templates::layouts.admin-lte.dashboard.body.status")
    
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          @yield('content')
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>