<div class="navbar-bg"></div>

@include('layouts.admin.partials._navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('member.dashboard.index') }}">{{ $setting['site_title'] ?? config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('member.dashboard.index') }}">{{ __('admin.SKO') }}</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="{{ setSidebarActive(['member.dashboard.*']) }}">
                <a href="{{ route('member.dashboard.index') }}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>{{ __('admin.Dashboard') }}</span>
                </a>
            </li>
            {{-- End Dashboard --}}

            {{-- Area & House --}}
            <li class="dropdown {{ setSidebarActive(['member.street.*', 'member.block.*', 'member.house.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-home"></i>
                    <span>{{ __('admin.Management House') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.street.*']) }}">
                        <a class="nav-link" href="{{ route('member.street.index') }}">{{ __('admin.Street') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.block.*']) }}">
                        <a class="nav-link" href="{{ route('member.block.index') }}">{{ __('admin.Block') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.house.*']) }}">
                        <a class="nav-link" href="{{ route('member.house.index') }}">{{ __('admin.House') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Area & House --}}

            {{-- Role & User --}}
            <li class="dropdown {{ setSidebarActive(['member.role.*', 'member.admin.*', 'member.staff.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ __('admin.Role & User') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.role.*']) }}">
                        <a class="nav-link" href="{{ route('member.role.index') }}">{{ __('admin.Role') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.admin.*']) }}">
                        <a class="nav-link" href="{{ route('member.admin.index') }}">{{ __('admin.Admin User') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['member.staff.*']) }}">
                        <a class="nav-link" href="{{ route('member.staff.index') }}">{{ __('admin.Staff User') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Role & User --}}

            {{-- Payment --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-money-check"></i>
                    <span>{{ __('admin.Payment') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="{{ route('member.role.index') }}">{{ __('admin.Automatic') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="{{ route('member.admin.index') }}">{{ __('admin.Bank Transfer') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Payment --}}

            {{-- Announcement Setting --}}
            <li class="{{ setSidebarActive(['member.announcement.*']) }}">
                <a href="{{ route('member.announcement.index') }}" class="nav-link">
                    <i class="fas fa-bullhorn"></i>
                    <span>{{ __('admin.Announcement') }}</span>
                </a>
            </li>
            {{-- End Announcement Setting --}}

            {{-- System Setting --}}
            <li class="{{ setSidebarActive(['member.setting.*']) }}">
                <a href="{{ route('member.setting.index') }}" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>{{ __('admin.Setting') }}</span>
                </a>
            </li>
            {{-- End System Setting --}}
        </ul>
    </aside>
</div>
