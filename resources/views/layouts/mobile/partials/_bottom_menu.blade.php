<div class="appBottomMenu">
    <a href="{{ route('mobile.dashboard.index') }}" class="item {{ request()->is('mobile/dashboard') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="file-tray-full-outline" role="img" class="md hydrated" aria-label="file-tray-full-outline">
            </ion-icon>
            <strong>{{ __('Dashboard') }}</strong>
        </div>
    </a>
    <a href="{{ route('mobile.dashboard.transaction') }}"
        class="item {{ request()->is('mobile/transaction') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="layers-outline" role="img" class="md hydrated" aria-label="layers-outline">
            </ion-icon>
            <span class="badge badge-danger">4</span>
            <strong>{{ __('Transaction') }}</strong>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <div class="action-button large btn-danger">
                <ion-icon name="radio-button-on-outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="{{ route('mobile.dashboard.notification') }}"
        class="item {{ request()->is('mobile/notification') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="notifications-outline" role="img" class="md hydrated"
                aria-label="notifications-outline">
            </ion-icon>
            <span class="badge badge-danger">4</span>
            <strong>{{ __('Notification') }}</strong>
        </div>
    </a>
    <a href="{{ route('mobile.dashboard.setting') }}"
        class="item {{ request()->is('mobile/setting') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="settings-outline" role="img" class="md hydrated" aria-label="settings outline">
            </ion-icon>
            <strong>{{ __('Setting') }}</strong>
        </div>
    </a>
</div>
