<div class="navbar-bg"></div>

@include('layouts.admin.partials._navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard.index') }}">{{ $setting['site_title'] ?? config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard.index') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="{{ setSidebarActive(['admin.dashboard.*']) }}">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>{{ __('admin.Dashboard') }}</span>
                </a>
            </li>
            {{-- End Dashboard --}}

            {{-- Package --}}
            <li class="{{ setSidebarActive(['admin.package.*']) }}">
                <a href="{{ route('admin.package.index') }}" class="nav-link">
                    <i class="fas fa-cube"></i>
                    <span>{{ __('admin.Package') }}</span>
                </a>
            </li>
            {{-- End Package --}}

            {{-- Residence --}}
            <li class="{{ setSidebarActive(['admin.residence.*']) }}">
                <a href="{{ route('admin.residence.index') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>{{ __('admin.Residence') }}</span>
                </a>
            </li>
            {{-- End Residence --}}

            {{-- Manage Admin Role & Permission --}}
            <li class="dropdown {{ setSidebarActive(['admin.permission.*', 'admin.role.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ __('admin.Admin Role Permission') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.role.*']) }}">
                        <a class="nav-link" href="{{ route('admin.role.index') }}">{{ __('admin.Role') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.permission.*']) }}">
                        <a class="nav-link" href="{{ route('admin.permission.index') }}">{{ __('admin.Permission') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Manage Admin Role & Permission --}}

            {{-- Manage User --}}
            <li class="dropdown {{ setSidebarActive(['admin.admin.*', 'admin.member.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-cog"></i>
                    <span>{{ __('admin.User Management') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.admin.*']) }}">
                        <a class="nav-link" href="{{ route('admin.admin.index') }}">{{ __('admin.Admin') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.member.*']) }}">
                        <a class="nav-link" href="{{ route('admin.member.index') }}">{{ __('admin.Member') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Manage User --}}

            {{-- Language --}}
            <li
                class="dropdown {{ setSidebarActive(['admin.language.*', 'admin.translate.admin*', 'admin.translate.mobile*', 'admin.translate.website*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-language"></i>
                    <span>{{ __('admin.Localization') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.language.*']) }}">
                        <a class="nav-link" href="{{ route('admin.language.index') }}">
                            <span>{{ __('admin.Languages') }}</span>
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.translate.admin*']) }}">
                        <a class="nav-link" href="{{ route('admin.translate.admin') }}">
                            <span>{{ __('admin.Admin Translate') }}</span>
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.translate.mobile*']) }}">
                        <a class="nav-link" href="{{ route('admin.translate.mobile') }}">
                            <span>{{ __('admin.Mobile Translate') }}</span>
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.translate.website*']) }}">
                        <a class="nav-link" href="{{ route('admin.translate.website') }}">
                            <span>{{ __('admin.Webite Translate') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Language --}}

            {{-- Payment --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-credit-card"></i>
                    <span>{{ __('admin.Payment') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="">
                            {{ __('admin.Bank Transfer') }}
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="">
                            {{ __('admin.Online Payment') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Payment --}}

            {{-- Support Ticket --}}
            <li class="">
                <a href="" class="nav-link">
                    <i class="fas fa-ticket-alt"></i>
                    <span>{{ __('admin.Support Ticket') }}</span>
                </a>
            </li>
            {{-- End Support Ticket --}}

            {{-- Website Setting --}}
            <li class="">
                <a href="" class="nav-link">
                    <i class="fas fa-globe"></i>
                    <span>{{ __('admin.Website Setting') }}</span>
                </a>
            </li>
            {{-- End Website Setting --}}

            {{-- System Setting --}}
            <li
                class="{{ setSidebarActive(['admin.setting.*', 'admin.general_setting.*', 'admin.notification_setting.*', 'admin.payment_setting.*']) }}">
                <a href="{{ route('admin.setting.index') }}" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>{{ __('admin.System Setting') }}</span>
                </a>
            </li>
            {{-- End System Setting --}}
        </ul>
    </aside>
</div>
