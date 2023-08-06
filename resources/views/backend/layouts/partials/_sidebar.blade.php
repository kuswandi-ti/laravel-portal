<div class="navbar-bg"></div>

@include('backend.layouts.partials._navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('backend.dashboard.index') }}">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Dashboard') }}</li>
            <li class="{{ setSidebarActive(['backend.dashboard.*']) }}">
                <a href="{{ route('backend.dashboard.index') }}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="menu-header">{{ __('Settings') }}</li>
            <li class="dropdown {{ setSidebarActive(['backend.permission.*', 'backend.role.*', 'backend.admin.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-users-cog"></i>
                    <span>{{ __('Access Management') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['backend.permission.*']) }}">
                        <a class="nav-link" href="{{ route('backend.permission.index') }}">{{ __('Permission') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['backend.role.*']) }}">
                        <a class="nav-link" href="{{ route('backend.role.index') }}">{{ __('Role') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['backend.admin.*']) }}">
                        <a class="nav-link" href="{{ route('backend.admin.index') }}">{{ __('Admin User') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ setSidebarActive(['backend.language.*']) }}">
                <a class="nav-link" href="{{ route('backend.language.index') }}">
                    <i class="fas fa-flag"></i>
                    <span>{{ __('Languages') }}</span>
                </a>
            </li>
            <li class="{{ setSidebarActive(['backend.setting.*']) }}">
                <a class="nav-link" href="{{ route('backend.setting.index') }}">
                    <i class="fas fa-cog"></i>
                    <span>{{ __('General Settings') }}</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
