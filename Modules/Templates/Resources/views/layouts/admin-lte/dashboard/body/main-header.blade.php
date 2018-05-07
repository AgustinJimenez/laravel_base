<header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini">{!! config('custom.template.logo-mini') !!}</span>
      <span class="logo-lg">{!! config('custom.template.logo-lg') !!}</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if( config('custom.template.ajax') )
            <li>
              <a href="#" id="template-back-button">
                <i class="fa fa-arrow-left fa-1x" aria-hidden="true"></i>
              </a>
            </li>
          @endif
          @if( config('custom.template.ajax') )
            <li>
              <a href="#" id="template-refresh-button">
                <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
              </a>
            </li>
          @endif
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user fa-lg"></i>
              <span class="hidden-xs">{{ ($auth_user = Auth::user())?$auth_user->name:'' }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <i class="fa  fa-user fa-5x text-white"></i>
                <p>
                  {{ ($auth_user)?$auth_user->name:'' }}
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form action="{{ route('logout') }}" method="POST" id="template-form-logout">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger btn-flat">Sign out</button>
                  </form>                  
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>