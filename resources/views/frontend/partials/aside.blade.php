<aside id="main-aside" class="main-sidebar {{config('settings.ctrl_sidebar_elevation')}} {{config('settings.ctrl_nav_disable_expand')}} {{config('settings.ctrl_sidebar_text_sm')}} {{config('settings.ctrl_sidebar_theme')}}">
            <!-- Brand Logo -->
            <a href="{{route('admin.dashboard')}}" class="brand-link {{config('settings.ctrl_brand_logo_varient')}} {{config('settings.ctrl_brand_text_sm')}}" id="brand-logo">
                <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{config('settings.site_name')}}</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="javascript:void(0)" class="d-block">{{auth()->user()->name}}<br>{{auth()->user()->roles()->first()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul id="main_nav_ul" class="nav nav-pills nav-sidebar flex-column {{config('settings.ctrl_nav_flat')}} {{config('settings.ctrl_nav_legacy')}} {{config('settings.ctrl_nav_compact')}} {{config('settings.ctrl_nav_child_indent')}} {{config('settings.ctrl_nav_collapse_hide_child')}}" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('admin.dashboard')}}" class="nav-link {{ Route::currentRouteName()== "admin.dashboard" ? 'active' :''}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">User Management</li>
                        @can('adminuser-index')
                        <li class="nav-item">
                            <a href="{{route('admin.admins.index')}}" class="nav-link {{ strpos(Route::currentRouteName(),"admin.admins") !== false ? 'active' :''}}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item {{ (strpos(Route::currentRouteName(),"admin.roles") !==false || strpos(Route::currentRouteName(),"admin.permissions")!== false) ? 'menu-is-opening menu-open' :''}}">
                            <a href="javascript:void(0)" class="nav-link {{ (strpos(Route::currentRouteName(),"admin.roles") !==false || strpos(Route::currentRouteName(),"admin.permissions")!== false) ? 'active' :''}}">
                                <i class="nav-icon fa fa-low-vision"></i>
                                <p>
                                    Roles & Permissions
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" {{ (strpos(Route::currentRouteName(),"admin.roles") !==false || strpos(Route::currentRouteName(),"admin.permissions")!== false) ? 'style="display:block"' :'style="display:none"'}}>
                                @can('role-index')
                                <li class="nav-item">
                                    <a href="{{route('admin.roles.index')}}" class="nav-link {{ strpos(Route::currentRouteName(),"admin.roles") !== false ? 'active' :''}}">
                                        <i class="fa fa-user-tag nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                @endcan
                                @can('permission-index')
                                <li class="nav-item">
                                    <a href="{{route('admin.permissions.index')}}" class="nav-link {{ strpos(Route::currentRouteName(),"admin.permissions") !== false ? 'active' :''}}">
                                        <i class="fa fa-key nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-header">Media Library</li>
                        @can('setting-index')
                        <li class="nav-item">
                            <a href="{{route('admin.media')}}" class="nav-link {{ strpos(Route::currentRouteName(),"admin.media") !== false ? 'active' :''}}">
                                <i class="nav-icon fa fa-image"></i>
                                <p>
                                    Media
                                </p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-header">System Settings</li>
                        @can('setting-index')
                        <li class="nav-item">
                            <a href="{{route('admin.settings.index')}}" class="nav-link {{ strpos(Route::currentRouteName(),"admin.settings") !== false ? 'active' :''}}">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
