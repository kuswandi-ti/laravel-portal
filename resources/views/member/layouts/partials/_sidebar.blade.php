<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset(config('common.path_template_member') . 'dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(config('common.path_template_member') . 'dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('member.dashboard.index') }}"
                        class="nav-link {{ setSidebarActive(['member.dashboard.*']) }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            {{ __('Admin Roles') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Management User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="#" class="nav-link">
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="#" class="nav-link">
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('member.setting.index') }}"
                        class="nav-link {{ setSidebarActive(['member.setting.*']) }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            {{ __('Setting') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
