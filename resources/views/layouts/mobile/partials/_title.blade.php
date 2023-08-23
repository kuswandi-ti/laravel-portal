<div class="appHeader">
    <div class="left">
        <a href="{{ url()->previous() }}" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        @yield('app_title')
    </div>
    @if (!getLoggedUser()->getRoleNames()->isEmpty())
        <div class="right">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
    @endif
</div>
