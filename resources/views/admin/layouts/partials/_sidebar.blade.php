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

            {{-- Package --}}
            <li class="{{ setSidebarActive(['admin.package.*']) }}">
                <a href="{{ route('admin.package.index') }}" class="nav-link">
                    <i class="fas fa-cube"></i>
                    <span>{{ __('Package') }}</span>
                </a>
            </li>
            {{-- End Package --}}

            {{-- Residence --}}
            <li class="{{ setSidebarActive(['admin.residence.*']) }}">
                <a href="{{ route('admin.residence.index') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>{{ __('Residence') }}</span>
                </a>
            </li>
            {{-- End Residence --}}

            {{-- Manage Admin Role & Permission --}}
            <li class="dropdown {{ setSidebarActive(['admin.permission.*', 'admin.role.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ __('Admin Role Permission') }}</span>
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
            {{-- End Manage Admin Role & Permission --}}

            {{-- Manage User --}}
            <li class="dropdown {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-cog"></i>
                    <span>{{ __('User Management') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.admin.*']) }}">
                        <a class="nav-link" href="{{ route('admin.admin.index') }}">{{ __('Super Admin') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.member.*']) }}">
                        <a class="nav-link" href="{{ route('admin.member.index') }}">{{ __('Member') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Manage User --}}

            {{-- Language --}}
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
                            <span>{{ __('Website Language') }}</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <span>{{ __('System Language') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Language --}}

            {{-- Payment --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-credit-card"></i>
                    <span>{{ __('Payment') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="">
                            {{ __('Offline Payment') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="">
                            {{ __('Online Payment') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Payment --}}

            {{-- Support Ticket --}}
            <li class="">
                <a href="" class="nav-link">
                    <i class="fas fa-ticket-alt"></i>
                    <span>{{ __('Support Ticket') }}</span>
                </a>
            </li>
            {{-- End Support Ticket --}}

            {{-- Website Setting --}}
            <li class="">
                <a href="" class="nav-link">
                    <i class="fas fa-globe"></i>
                    <span>{{ __('Website Setting') }}</span>
                </a>
            </li>
            {{-- End Website Setting --}}

            {{-- System Setting --}}
            <li
                class="{{ setSidebarActive(['admin.setting.*', 'admin.general_setting.*', 'admin.notification_setting.*']) }}">
                <a href="{{ route('admin.setting.index') }}" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>{{ __('System Setting') }}</span>
                </a>
            </li>
            {{-- End System Setting --}}
        </ul>
    </aside>
</div>
