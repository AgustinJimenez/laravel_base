<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">

      @section('header')
      @show

      @section('breadcrumb')
        <ol class="breadcrumb">
          @php($template_url = '')
          @foreach( $template_requested_path = explode('/', request()->path()) as $key => $value )
            @php($template_url .= '/'.$value)
            @if( (int)$value == '' )
              <li @if( count($template_requested_path) == $key ) class="active"@endif> 
                <a href="{{ url( $template_url ) }}">
                  @if( !$key ) 
                    <i class="fa fa-dashboard"></i> 
                  @endif 
                  {{ $value }}
                </a>
              </li>
            @endif 
          @endforeach
        </ol>
      @show
      
      @section('status')
        
          @if (session('status'))
            <br>
            <div class="container-fluid">
              <div class="callout callout-success">
                  {{ session('status') }}
              </div>
            </div>
          @endif
          
        <?php
          $type = session()->has('success') ? 'success' : ( session()->has('error') ? 'error' : ( session()->has('warning') ? 'warning' : null ) );
          $alert_class = ($type == 'success') ? 'alert-success' : ( $type == 'error' ? 'alert-danger' : 'alert-warning' );
        ?>

        @if( isset($type) and $type )
          <div class="alert {{ $alert_class }} fade in alert-dismissable">
            @if( is_array( $session_messages = session()->get($type) ) )
              <ul>
                @foreach ($session_messages as $message)
                  <li>{{ $message }}</li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @else
              {{ $session_messages }}
            @endif
          </div>
        @endif

      @show
      
      @section('error')
        @if( $errors->any() )
          <br>
            <div class="alert alert-danger fade in alert-dismissable">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif
      @show
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