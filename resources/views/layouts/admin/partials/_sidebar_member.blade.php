<div class="navbar-bg"></div>

@include('layouts.admin.partials._navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('member.dashboard.index') }}">{{ $setting['site_title'] ?? config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('member.dashboard.index') }}">{{ __('SKO') }}</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="{{ setSidebarActive(['member.dashboard.*']) }}">
                <a href="{{ route('member.dashboard.index') }}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            {{-- End Dashboard --}}

            {{-- Manage Admin Role & Permission --}}
            <li class="dropdown {{ setSidebarActive(['member.role.*', 'member.admin.*', 'member.user.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ __('Management User') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.role.*']) }}">
                        <a class="nav-link" href="{{ route('member.role.index') }}">{{ __('Role') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.admin.*']) }}">
                        <a class="nav-link" href="{{ route('member.admin.index') }}">{{ __('Admin') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.user.*']) }}">
                        <a class="nav-link" href="{{ route('member.user.index') }}">{{ __('User') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Manage Admin Role & Permission --}}
            {{-- System Setting --}}
            <li class="{{ setSidebarActive(['member.setting.*']) }}">
                <a href="{{ route('member.setting.index') }}" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>{{ __('Setting') }}</span>
                </a>
            </li>
            {{-- End System Setting --}}
        </ul>
    </aside>
</div>
