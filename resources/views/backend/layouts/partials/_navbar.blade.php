<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="ml-auto navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('public/template/backend/assets/img/avatar/avatar-1.png') }}"
                    class="mr-1 rounded-circle">
                <div class="d-sm-none d-lg-inline-block">{{ __('Hi') }}, {{ auth()->guard('admin')->user()->name }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('backend.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> {{ __('Settings') }}
                </a>
                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('backend.logout') }}">
                    @csrf
                    <a href="{{ route('backend.logout') }}" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault();
                    this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
