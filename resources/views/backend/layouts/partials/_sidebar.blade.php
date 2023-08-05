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
                <a href="{{ route('backend.dashboard.index') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>

            <li class="menu-header">{{ __('Master') }}</li>
            <li class="{{ setSidebarActive(['backend.language.*']) }}">
                <a class="nav-link" href="{{ route('backend.language.index') }}">
                    <i class="far fa-keyboard"></i>
                    <span>{{ __('Languages') }}</span>
                </a>
            </li>

            <li class="menu-header">{{ __('Settings') }}</li>
            <li class="dropdown {{ setSidebarActive(['backend.permission.*', 'backend.role.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-cog"></i>
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
            </li>
        </ul>
    </aside>
</div>
