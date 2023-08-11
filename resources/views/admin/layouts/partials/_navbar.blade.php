<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="mr-3 navbar-nav">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </li>
    </ul>
    <ul class="ml-auto navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image"
                    src="{{ asset(config('common.path_template_admin') . 'assets/img/avatar/avatar-1.png') }}"
                    class="mr-1 rounded-circle">
                <div class="d-sm-none d-lg-inline-block">{{ __('Hi') }}, {{ auth()->guard('admin')->user()->name }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>
                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item has-icon text-danger logout">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
                <form action="{{ route('admin.logout') }}" method="post" id="form-logout">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
