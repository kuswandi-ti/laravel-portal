<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="mr-3 navbar-nav">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </li>
    </ul>
    <ul class="ml-auto navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (getGuardNameLoggedUser() == getGuardNameAdmin())
                    <img alt="image"
                        src="{{ url(config('common.path_image_storage') . (!empty(getLoggedUser()->image) ? getLoggedUser()->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                        class="mr-1 rounded-circle">
                @elseif (getGuardNameLoggedUser() == getGuardNameMember())
                    <img alt="image"
                        src="{{ url(config('common.path_image_storage') . (!empty(getLoggedUser()->image) ? getLoggedUser()->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                        class="mr-1 rounded-circle">
                @endif
                <div class="d-sm-none d-lg-inline-block">{{ __('Hi') }},
                    {{ getLoggedUser()->name }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route(getGuardNameLoggedUser() . '.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>

                <div class="dropdown-divider"></div>

                @if (getGuardNameLoggedUser() == getGuardNameMember())
                    <a href="#" class="dropdown-item has-icon">
                        <i class="fas fa-briefcase"></i> {{ __('My Package') }}
                    </a>
                    <a href="#" class="dropdown-item has-icon">
                        <i class="fas fa-business-time"></i> {{ __('Upgrade Package') }}
                    </a>

                    <div class="dropdown-divider"></div>
                @endif

                <a href="#" class="dropdown-item has-icon text-danger logout">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
                <form action="{{ route(getGuardNameLoggedUser() . '.logout') }}" method="post" id="form-logout">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
