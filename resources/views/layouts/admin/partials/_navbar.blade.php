<nav class="navbar navbar-expand-lg main-navbar">
    <div class="mr-auto form-inline">
        <ul class="mr-3 navbar-nav">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </div>

    <ul class="ml-auto navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image"
                    src="{{ url(config('common.path_storage') . (!empty(getLoggedUser()->image) ? getLoggedUser()->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                    class="mr-1 rounded-circle">
                <div class="d-sm-none d-lg-inline-block">{{ __('admin.Hi') }},
                    {{ getLoggedUser()->name }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route(getGuardNameLoggedUser() . '.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('admin.Profile') }}
                </a>

                <div class="dropdown-divider"></div>

                @if (getGuardNameLoggedUser() == getGuardNameMember())
                    <a href="#" class="dropdown-item has-icon">
                        <i class="fas fa-briefcase"></i> {{ __('admin.My Package') }}
                    </a>
                    <a href="#" class="dropdown-item has-icon">
                        <i class="fas fa-business-time"></i> {{ __('admin.Upgrade Package') }}
                    </a>

                    <div class="dropdown-divider"></div>
                @endif

                <a href="#" class="dropdown-item has-icon text-danger logout">
                    <i class="fas fa-sign-out-alt"></i> {{ __('admin.Logout') }}
                </a>
                <form action="{{ route(getGuardNameLoggedUser() . '.logout') }}" method="post" id="form-logout">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
