<!-- App Sidebar -->
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="p-0 modal-body">
                <!-- profile box -->
                <div class="pt-2 pb-2 profileBox">
                    <div class="image-wrapper">
                        <img src="{{ asset(config('common.path_storage') . (!empty(getLoggedUser()->image) ? getLoggedUser()->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                            alt="image" class="imaged w36">
                    </div>
                    <div class="in">
                        <strong>{{ getLoggedUser()->name }}</strong>
                        <span class="badge badge-info">{{ getLoggedUser()->getRoleNames()->first() }}</span>
                        <div class="text-muted">{{ getHouseAddressUser() }}</div>
                    </div>
                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>
                <!-- * profile box -->
                <!-- balance -->
                <div class="sidebar-balance">
                    <div class="listview-title">Balance</div>
                    <div class="in">
                        <h1 class="amount">$ 2,562.50</h1>
                    </div>
                </div>
                <!-- * balance -->

                <!-- action group -->
                <div class="action-group">
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            Deposit
                        </div>
                    </a>
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            Withdraw
                        </div>
                    </a>
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            Send
                        </div>
                    </a>
                    <a href="app-cards.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            My Cards
                        </div>
                    </a>
                </div>
                <!-- * action group -->

                <!-- setup -->
                <div class="mt-1 listview-title">{{ __('Menu') }}</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route('mobile.user.index') }}" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="body"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('User Management') }}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mobile.account-category.index') }}" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="albums"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('Account Category') }}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="pie-chart-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Overview
                                <span class="badge badge-primary">10</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-pages.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Pages
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-components.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="apps-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Components
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-cards.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Cards
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- * setup -->

                <!-- others -->
                <div class="mt-1 listview-title">Others</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="app-settings.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="settings-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Settings
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="component-messages.html" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Support
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- * others -->
            </div>
        </div>
    </div>
</div>
<!-- * App Sidebar -->
