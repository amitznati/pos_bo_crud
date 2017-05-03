@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-{!! $left !!} image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-{!! $left !!} info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
        <!-- Catalog - Products, Department, Groups... -->
          <li class="treeview">
            <a href="#"><i class="fa fa-group"></i> <span>{{trans('pos.catalog.catalog')}}</span> <i class="fa fa-angle-{!! $right !!} pull-{!! $right !!}"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/product') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.catalog.product.products')}}</span></a></li>
              <li><a href="{{ url('admin/department') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.catalog.department.departments')}}</span></a></li>
              <li><a href="{{ url('admin/group') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.catalog.group.groups')}}</span></a></li>
              <li><a href="{{ url('admin/vendor') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.catalog.vendor.vendors')}}</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-group"></i> <span>{{trans('pos.menu_display.menu_display')}}</span> <i class="fa fa-angle-{!! $right !!} pull-{!! $right !!}"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/menu') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.menu_display.menu.menus')}}</span></a></li>
              <li><a href="{{ url('admin/menu_design') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.menu_display.menu_design.menu_design')}}</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-wrench"></i> <span>{{trans('pos.people.people')}}</span> <i class="fa fa-angle-{{$right}} pull-{{$right}}"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/employee') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.people.employee.employees')}}</span></a></li>
              <li><a href="{{ url('admin/customer') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.people.customer.customers')}}</span></a></li>
              <li><a href="{{ url('admin/contact') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.people.contact.contacts')}}</span></a></li> 
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-wrench"></i> <span>{{trans('pos.stores.stores')}}</span> <i class="fa fa-angle-{{$right}} pull-{{$right}}"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/store') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.stores.stores')}}</span></a></li>
              <li><a href="{{ url('admin/pos') }}"><i class="fa fa-tag"></i> <span>{{trans('pos.stores.pos.poss')}}</span></a></li>
            </ul>
          </li>
          <!-- Users, Roles Permissions -->
          <li class="treeview">
            <a href="#"><i class="fa fa-group"></i> <span>{{ trans('backpack::base.users_roles_permissions') }}</span> <i class="fa fa-angle-{!! $right !!} pull-{!! $right !!}"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/user') }}"><i class="fa fa-user"></i> <span>{{trans('permissionmanager.users')}}</span></a></li>
              <li><a href="{{ url('admin/role') }}"><i class="fa fa-group"></i> <span>{{trans('permissionmanager.roles')}}</span></a></li>
              <li><a href="{{ url('admin/permission') }}"><i class="fa fa-key"></i> <span>{{trans('permissionmanager.permission_plural')}}</span></a></li>
              <li><a href="{{ url('admin/salerytype') }}"><i class="fa fa-key"></i> <span>{{trans('pos.people.employee.salery_types')}}</span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-wrench"></i> <span>{{ trans('backpack::base.administration') }}</span> <i class="fa fa-angle-{{$right}} pull-{{$right}}"></i></a>
            <ul class="treeview-menu">
             {{--  <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
              <!-- ================================================ -->
              <!-- ==== Recommended place for admin menu items ==== -->
              <!-- ================================================ -->
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-globe"></i> <span>{{ trans('backpack::langfilemanager.translations') }}</span> <i class="fa fa-angle-{!! $right !!} pull-{!! $right !!}"></i></a>
                <ul class="treeview-menu">
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language') }}"><i class="fa fa-flag-checkered"></i> {{ trans('backpack::langfilemanager.languages') }}</a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language/texts') }}"><i class="fa fa-language"></i> {{ trans('backpack::langfilemanager.site_texts') }}</a></li>
                </ul>
              </li>
              <li><a href="{{ url('admin/backup') }}"><i class="fa fa-hdd-o"></i> <span>{{ trans('backpack::backup.backup') }}</span></a></li>
              <li><a href="{{ url('admin/log') }}"><i class="fa fa-terminal"></i> <span>{{ trans('backpack::logmanager.logs') }}</span></a></li>
              <li><a href="{{ url('admin/setting') }}"><i class="fa fa-cog"></i> <span>{{ trans('backpack::settings.setting_plural') }}</span></a></li>
              {{-- <li><a href="{{ url('admin/page') }}"><i class="fa fa-file-o"></i> <span>{{ trans('backpack::backup.backup') }}</span></a></li> --}}
            </ul>
          </li>
          
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
