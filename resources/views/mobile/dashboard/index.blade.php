@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._header')

    <div class="pt-1 section wallet-card-section">
        <div class="wallet-card">
            <div class="balance">
                <div class="left">
                    <span class="title">{{ getHouseAddressUser() }}</span>
                    <h1 class="total">{{ getLoggedUser()->name }}</h1>
                </div>
                <div class="right">
                    <div class="avatar-section">
                        <a href="#">
                            <img src="{{ asset(config('common.path_storage') . (!empty(getLoggedUser()->image) ? getLoggedUser()->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                                alt="avatar" class="rounded imaged" style="width: 80px;">
                        </a>
                    </div>
                </div>
            </div>

            <div class="wallet-footer">
                <div class="item">
                    <a href="app-cards.html">
                        <div class="icon-wrapper bg-success">
                            <ion-icon name="arrow-down-circle-outline"></ion-icon>
                        </div>
                        <strong>{{ __('Deposits') }}</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">
                        <div class="icon-wrapper bg-danger">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon>
                        </div>
                        <strong>{{ __('Withdraw') }}</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exchangeActionSheet">
                        <div class="icon-wrapper bg-warning">
                            <ion-icon name="navigate-outline"></ion-icon>
                        </div>
                        <strong>{{ __('Send') }}</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#sendActionSheet">
                        <div class="icon-wrapper">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                        <strong>{{ __('Pay Bills') }}</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="mt-2 text-center row">
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">{{ __('Total Balance') }}</div>
                    <div class="value text-success">Rp. 1.000.000</div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">{{ __('Bills Total') }}</span></div>
                    <div class="value text-danger">Rp. 500.000</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-4 section">
        <div class="owl-carousel owl-theme owl-carousel-info">
            @foreach ($announs as $item)
                <a href="{{ route('mobile.dashboard.show_announcement', $item->id) }}">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <h2 class="text-center">{{ $item->title }}</h2>
                            {!! truncateString($item->body, 255) !!}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="mt-4 mb-4 section">
        <div class="section-heading">
            <h2 class="title">5 Transaksi Terakhir</h2>
            <a href="#" class="link">Lihat Semua</a>
        </div>
        <div class="card">
            <ul class="mt-1 mb-1 listview flush transparent no-line image-listview detailed-list">
                <li>
                    <div class="item">
                        <div class="icon-box text-success">
                            <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash-outline">
                            </ion-icon>
                        </div>
                        <div class="in">
                            <div>
                                <strong>Januari 2023</strong>
                                <div class="text-small text-secondary">Cash. Senin, 10 Januari 2023</div>
                            </div>
                            <div class="text-end">
                                <strong>Rp. 100.000</strong>
                                <div class="text-small">
                                    <span class="badge badge-success">
                                        <ion-icon name="checkmark-outline" role="img" class="md hydrated"
                                            aria-label="checkmark-outline"></ion-icon>
                                        Transaksi Sukses
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="icon-box text-success">
                            <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash-outline">
                            </ion-icon>
                        </div>
                        <div class="in">
                            <div>
                                <strong>Februari 2023</strong>
                                <div class="text-small text-secondary">Transfer. Senin, 10 Februari 2023</div>
                            </div>
                            <div class="text-end">
                                <strong>Rp. 100.000</strong>
                                <div class="text-small">
                                    <span class="badge badge-success">
                                        <ion-icon name="checkmark-outline" role="img" class="md hydrated"
                                            aria-label="checkmark-outline"></ion-icon>
                                        Transaksi Sukses
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="icon-box text-success">
                            <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash-outline">
                            </ion-icon>
                        </div>
                        <div class="in">
                            <div>
                                <strong>Maret 2023</strong>
                                <div class="text-small text-secondary">Cash. Senin, 10 Maret 2023</div>
                            </div>
                            <div class="text-end">
                                <strong>Rp. 100.000</strong>
                                <div class="text-small">
                                    <span class="badge badge-success">
                                        <ion-icon name="checkmark-outline" role="img" class="md hydrated"
                                            aria-label="checkmark-outline"></ion-icon>
                                        Transaksi Sukses
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="icon-box text-success">
                            <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash-outline">
                            </ion-icon>
                        </div>
                        <div class="in">
                            <div>
                                <strong>April 2023</strong>
                                <div class="text-small text-secondary">Cash. Senin, 10 April 2023</div>
                            </div>
                            <div class="text-end">
                                <strong>Rp. 100.000</strong>
                                <div class="text-small">
                                    <span class="badge badge-success">
                                        <ion-icon name="checkmark-outline" role="img" class="md hydrated"
                                            aria-label="checkmark-outline"></ion-icon>
                                        Transaksi Sukses
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <div class="icon-box text-danger">
                            <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash-outline">
                            </ion-icon>
                        </div>
                        <div class="in">
                            <div>
                                <strong>Mei 2023</strong>
                                <div class="text-small text-secondary">Cash. Senin, 10 Mei 2023</div>
                            </div>
                            <div class="text-end">
                                <strong>Rp. 100.000</strong>
                                <div class="text-small">
                                    <span class="badge badge-danger">
                                        <ion-icon name="checkmark-outline" role="img" class="md hydrated"
                                            aria-label="checkmark-outline"></ion-icon>
                                        Transaksi Gagal
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="mt-4 mb-4 section full">
        <div class="section-heading padding">
            <h2 class="title">Info Terkini</h2>
            <a href="app-blog.html" class="link">Lihat Semua</a>
        </div>

        <div class="owl-carousel owl-theme owl-carousel-news" style="padding-left: 16px; padding-right: 16px;">
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news1.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">What will be the value of bitcoin in the next...</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news2.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Rules you need to know in business</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news5.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">10 easy ways to save your money</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news4.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Follow the financial agenda with...</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news5.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">What will be the value of bitcoin in the next...</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news1.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Rules you need to know in business</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news1.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">10 easy ways to save your money</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/news/news1.png') }}"
                        alt="image" class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Follow the financial agenda with...</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>

    @include('layouts.mobile.partials._footer')
@endsection

@include('layouts.mobile.includes.owl_carousel')
