  <aside class="main-sidebar">

    <section class="sidebar">

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> List Users </a></li>
            <li><a href="{{ route('admin.users.role.index') }}"><i class="fa fa-users"></i> List Roles </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-file"></i>
            <span>Multimedia</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.media.index') }}"><i class="fa fa-users"></i> Media Files </a></li>
          </ul>
        </li>
      </ul>
    
    </section>

  </aside>