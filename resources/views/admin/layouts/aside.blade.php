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
        <a href="{{route('system_admin.category.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Danh mục</span>
        </a>
      </li>

      @php
        $arg_staff = array(
          'system_admin.color.index',
          'system_admin.color.create',
          'system_admin.color.edit',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.color.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Màu sắc</span>
        </a>
      </li>

      @php
        $arg_staff = array(
          'system_admin.brand.index',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.brand.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Thương hiệu</span>
        </a>
      </li>

      @php
        $arg_staff = array(
          'system_admin.hard.index',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.hard.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Hard Driver</span>
        </a>
      </li>

      @php
        $arg_staff = array(
          'system_admin.screen.index',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.screen.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Screen</span>
        </a>
      </li>

      @php
        $arg_staff = array(
          'system_admin.price.index',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.price.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Price</span>
        </a>
      </li>

      @php
        $arg_staff = array(
          'system_admin.ram.index',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.ram.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Ram</span>
        </a>
      </li>
  
      @php
        $arg_staff = array(
          'system_admin.product.index',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.product.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>Sản Phẩm</span>
        </a>
      </li>

      @php
        $arg_staff = array(
          'system_admin.cpu.index',
        );
      @endphp
      @if ( in_array($name, $arg_staff) )
        <li class="active">
      @else
        <li>
      @endif
        <a href="{{route('system_admin.cpu.index')}}">
          <i class="fa fa-database" aria-hidden="true"></i> <span>CPU</span>
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
            <a href="{{-- {{route('system_admin.email.index')}} --}}">
              <i class="fa fa-inbox"></i> Inbox
            </a>
          </li>
        </ul> 
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>