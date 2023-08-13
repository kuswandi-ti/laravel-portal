<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset(config('common.path_template_member') . 'dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
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
                            {{ __('Management User') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="ml-3 nav-item">
                            <a href="#" class="nav-link">
                                <p>{{ __('Admin') }}</p>
                            </a>
                        </li>
                        <li class="ml-3 nav-item">
                            <a href="#" class="nav-link">
                                <p>{{ __('User') }}</p>
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
