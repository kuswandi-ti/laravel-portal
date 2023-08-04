<div class="navbar-bg"></div>

@include('backend.layouts.partials._navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('backend.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <a href="{{ route('backend.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('admin/language*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('backend.language.index') }}">
                    <i class="far fa-keyboard"></i>
                    <span>Languages</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="blank.html">
                    <i class="far fa-square"></i>
                    <span>Blank Page</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-file-alt"></i>
                    <span>Forms</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
