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

            {{-- Account --}}
            @if (canAccess(['account category restore', 'account restore']))
                <li class="dropdown {{ setSidebarActive(['member.account_category.*', 'member.account.*']) }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-wallet"></i>
                        <span>{{ __('admin.Account') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['account category restore']))
                            <li class="{{ setSidebarActive(['member.account_category.*']) }}">
                                <a class="nav-link"
                                    href="{{ route('member.account_category.index') }}">{{ __('admin.Account Category') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="dropdown-menu">
                        @if (canAccess(['account restore']))
                            <li class="{{ setSidebarActive(['member.account.*']) }}">
                                <a class="nav-link"
                                    href="{{ route('member.account.index') }}">{{ __('admin.Account') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            {{-- End Account --}}

            {{-- Area & House --}}
            @if (canAccess(['street index', 'block index', 'house index']))
                <li class="dropdown {{ setSidebarActive(['member.street.*', 'member.block.*', 'member.house.*']) }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-home"></i>
                        <span>{{ __('admin.Management House') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['street index']))
                            <li class="{{ setSidebarActive(['member.street.*']) }}">
                                <a class="nav-link" href="{{ route('member.street.index') }}">{{ __('admin.Street') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="dropdown-menu">
                        @if (canAccess(['block index']))
                            <li class="{{ setSidebarActive(['member.block.*']) }}">
                                <a class="nav-link" href="{{ route('member.block.index') }}">{{ __('admin.Block') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="dropdown-menu">
                        @if (canAccess(['house index']))
                            <li class="{{ setSidebarActive(['member.house.*']) }}">
                                <a class="nav-link" href="{{ route('member.house.index') }}">{{ __('admin.House') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            {{-- End Area & House --}}

            {{-- Role & User --}}
            @if (canAccess(['role member index', 'member admin user index', 'member staff user index', 'member user restore']))
                <li
                    class="dropdown {{ setSidebarActive(['member.role.*', 'member.admin.*', 'member.staff.*', 'member.user.*']) }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-user-shield"></i>
                        <span>{{ __('admin.Role & User') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['role member index']))
                            <li class="{{ setSidebarActive(['member.role.*']) }}">
                                <a class="nav-link" href="{{ route('member.role.index') }}">{{ __('admin.Role') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="dropdown-menu">
                        @if (canAccess(['member admin user index']))
                            <li class="{{ setSidebarActive(['member.admin.*']) }}">
                                <a class="nav-link" href="{{ route('member.admin.index') }}">{{ __('admin.Admin') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="dropdown-menu">
                        @if (canAccess(['member staff user index']))
                            <li class="{{ setSidebarActive(['member.staff.*']) }}">
                                <a class="nav-link" href="{{ route('member.staff.index') }}">{{ __('admin.Staff') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="dropdown-menu">
                        @if (canAccess(['member user restore']))
                            <li class="{{ setSidebarActive(['member.user.*']) }}">
                                <a class="nav-link" href="{{ route('member.user.index') }}">{{ __('admin.User') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            {{-- End Role & User --}}

            {{-- Announcement Setting --}}
            @if (canAccess(['announcement index']))
                <li class="{{ setSidebarActive(['member.announcement.*']) }}">
                    <a href="{{ route('member.announcement.index') }}" class="nav-link">
                        <i class="fas fa-bullhorn"></i>
                        <span>{{ __('admin.Announcement') }}</span>
                    </a>
                </li>
            @endif
            {{-- End Announcement Setting --}}

            {{-- System Setting --}}
            @if (canAccess(['member setting']))
                <li class="{{ setSidebarActive(['member.setting.*']) }}">
                    <a href="{{ route('member.setting.index') }}" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>{{ __('admin.Setting') }}</span>
                    </a>
                </li>
            @endif
            {{-- End System Setting --}}
        </ul>
    </aside>
</div>
