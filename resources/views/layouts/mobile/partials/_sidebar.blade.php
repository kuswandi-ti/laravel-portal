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
                {{-- <div class="sidebar-balance">
                    <div class="listview-title">Balance</div>
                    <div class="in">
                        <h1 class="amount">$ 2,562.50</h1>
                    </div>
                </div> --}}
                <!-- * balance -->

                <!-- action group -->
                {{-- <div class="action-group">
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            {{ __('Income') }}
                        </div>
                    </a>
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="remove"></ion-icon>
                            </div>
                            {{ __('Expense') }}
                        </div>
                    </a>
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="volume-high"></ion-icon>
                            </div>
                            {{ __('Announce') }}
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
                </div> --}}
                <!-- * action group -->

                <div class="mt-1 listview-title">{{ __('Main Data') }}</div>
                <ul class="listview flush transparent no-line image-listview">
                    @if (canAccess(['member user index']))
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
                    @endif
                    @if (canAccess(['bank member index']))
                        <li>
                            <a href="{{ route('mobile.bank-member.index') }}" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="briefcase"></ion-icon>
                                </div>
                                <div class="in">
                                    {{ __('Cash & Bank') }}
                                </div>
                            </a>
                        </li>
                    @endif
                    @if (canAccess(['account category index', 'account index']))
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
                    @endif
                </ul>

                <div class="mt-1 listview-title">{{ __('Transaction') }}</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route('mobile.dues.index') }}" class="item">
                            <div class="icon-box bg-warning">
                                <ion-icon name="layers"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('Generate Dues') }}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mobile.user.index') }}" class="item">
                            <div class="icon-box bg-warning">
                                <ion-icon name="arrow-down-circle"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('Income Transaction') }}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mobile.user.index') }}" class="item">
                            <div class="icon-box bg-warning">
                                <ion-icon name="arrow-up-circle"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('Expense Transaction') }}
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="mt-1 listview-title">{{ __('Report') }}</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route('mobile.user.index') }}" class="item">
                            <div class="icon-box bg-info">
                                <ion-icon name="document"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('User Data Report') }}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mobile.user.index') }}" class="item">
                            <div class="icon-box bg-info">
                                <ion-icon name="document"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('Income Report') }}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mobile.user.index') }}" class="item">
                            <div class="icon-box bg-info">
                                <ion-icon name="document"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('Expense Report') }}
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="mt-1 listview-title">{{ __('Setting') }}</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route('mobile.user.index') }}" class="item">
                            <div class="icon-box bg-danger">
                                <ion-icon name="build"></ion-icon>
                            </div>
                            <div class="in">
                                {{ __('System Setting') }}
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- * App Sidebar -->
