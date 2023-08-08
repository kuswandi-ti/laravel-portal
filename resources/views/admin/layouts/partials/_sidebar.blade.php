<div class="navbar-bg"></div>

@include('admin.layouts.partials._navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard.index') }}">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard.index') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="{{ setSidebarActive(['admin.dashboard.*']) }}">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            {{-- End Dashboard --}}

            {{-- Configuration --}}
            <li class="menu-header">{{ __('Configuration') }}</li>
            <li class="dropdown {{ setSidebarActive(['admin.permission.*', 'admin.role.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ __('Role & Permission') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.role.*']) }}">
                        <a class="nav-link" href="{{ route('admin.role.index') }}">{{ __('Role') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.permission.*']) }}">
                        <a class="nav-link" href="{{ route('admin.permission.index') }}">{{ __('Permission') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setSidebarActive(['admin.admin.*', 'admin.user.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-cog"></i>
                    <span>{{ __('Manage Users') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.admin.*']) }}">
                        <a class="nav-link" href="{{ route('admin.admin.index') }}">{{ __('Super Admin') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.user.*']) }}">
                        <a class="nav-link" href="{{ route('admin.user.index') }}">{{ __('General User') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setSidebarActive(['admin.language.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-language"></i>
                    <span>{{ __('Localization') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.language.*']) }}">
                        <a class="nav-link" href="{{ route('admin.language.index') }}">
                            <span>{{ __('Languages') }}</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <span>{{ __('Frontend Language') }}</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <span>{{ __('Admin Language') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ setSidebarActive(['admin.setting.*']) }}">
                <a class="nav-link" href="{{ route('admin.setting.index') }}">
                    <i class="fas fa-cog"></i>
                    <span>{{ __('Settings') }}</span>
                </a>
            </li>
            {{-- End Configuration --}}
        </ul>
    </aside>
</div>
