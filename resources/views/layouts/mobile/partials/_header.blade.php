<div class="appHeader bg-primary text-light">
    @if (!getLoggedUser()->getRoleNames()->isEmpty())
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
    @endif
    <div class="pageTitle">
        <img src="{{ asset('public/template/mobile/assets/img/logo.png') }}" alt="logo" class="logo">
    </div>
    <div class="right">
        <a href="#" class="headerButton">
            <ion-icon class="icon" name="chatbubble-ellipses-outline"></ion-icon>
        </a>
        <a href="app-settings.html" class="headerButton">
            <ion-icon class="icon" name="bulb-outline"></ion-icon>
        </a>
    </div>
</div>
