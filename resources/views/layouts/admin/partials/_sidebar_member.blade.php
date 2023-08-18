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

            {{-- Area & House --}}
            <li class="dropdown {{ setSidebarActive(['member.street.*', 'member.block.*', 'member.house.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-layer-group"></i>
                    <span>{{ __('Management Area') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.street.*']) }}">
                        <a class="nav-link" href="{{ route('member.street.index') }}">{{ __('Street') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.block.*']) }}">
                        <a class="nav-link" href="{{ route('member.block.index') }}">{{ __('Block') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.house.*']) }}">
                        <a class="nav-link" href="{{ route('member.house.index') }}">{{ __('House') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Area & House --}}

            {{-- Role & User --}}
            <li class="dropdown {{ setSidebarActive(['member.role.*', 'member.admin.*', 'member.staff.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ __('Role & User') }}</span>
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
                    <li class="{{ setSidebarActive(['member.staff.*']) }}">
                        <a class="nav-link" href="{{ route('member.staff.index') }}">{{ __('Staff') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Role & User --}}

            {{-- Payment --}}
            <li class="dropdown {{ setSidebarActive(['member.role.*', 'member.admin.*', 'member.staff.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-money-check"></i>
                    <span>{{ __('Payment') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.role.*']) }}">
                        <a class="nav-link" href="{{ route('member.role.index') }}">{{ __('Automatic') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.admin.*']) }}">
                        <a class="nav-link" href="{{ route('member.admin.index') }}">{{ __('Bank Transfer') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Payment --}}

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
