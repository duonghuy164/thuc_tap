<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    @php
      $name = Route::currentRouteName();
      $user = \Auth::guard('admin')->user();

    @endphp
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div> 
      <div class="pull-left info">
        <p>{{$user->name}}</p>
        <i class="fa fa-circle text-success"></i> Online
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      @php
        $arg_dashboard = array(
          'system_admin.get_dashboard'
        );
      @endphp
      @if ( in_array($name, $arg_dashboard) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{ route('system_admin.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      @php
        $arg_staff = array(
          'system_admin.staffs.index',
          'system_admin.staffs.create',
          'system_admin.staffs.edit',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.staffs.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Nhân viên</span>
        </a>
      </li>
      @php
        $arg_page = array(
          'system_admin.timekeeping.index'
        );
      @endphp
      @if ( in_array($name, $arg_page) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.timekeeping.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Chấm công</span>
        </a>
      </li>
      @php
        $arg_faq = array(
          'system_admin.faqs.index', 
          'system_admin.faqs.create' , 
          'system_admin.faqs.edit',
          'system_admin.faqs_categories.index',
          'system_admin.faqs_categories.create' , 
          'system_admin.faqs_categories.edit'
        );
      @endphp
      @if ( in_array($name, $arg_faq) )
        <li class="treeview active">
      @else
        <li class="treeview">
      @endif
        <a href="#">
          <i class="fa fa-envelope" aria-hidden="true"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{route('system_admin.email.index')}}">
              <i class="fa fa-inbox"></i> Inbox
            </a>
          </li>
        </ul> 
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>