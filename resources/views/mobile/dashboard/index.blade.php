@extends('mobile.layouts.master')

@section('app_title', 'Dashboard')

@push('styles_vendor')
    <link rel="stylesheet"
        href="{{ asset('public/template/mobile/assets/js/plugins/OwlCarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/template/mobile/assets/js/plugins/OwlCarousel/assets/owl.theme.default.min.css') }}">
@endpush

@section('frontend_content')
    @includeIf('mobile.layouts.partials.header')

    <div class="section wallet-card-section pt-1">
        <div class="wallet-card">
            <div class="balance">
                <div class="left">
                    <span class="title">Cluster Bukit Jaya</span>
                    <h1 class="total">Mr. John</h1>
                </div>
                <div class="right">
                    <div class="avatar-section">
                        <a href="#">
                            <img src="{{ asset('public/template/mobile/assets/img/sample/avatar/avatar1.jpg') }}"
                                alt="avatar" class="imaged rounded" style="width: 80px;">
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
                        <strong>Deposit</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">
                        <div class="icon-wrapper bg-danger">
                            <ion-icon name="arrow-up-circle-outline"></ion-icon>
                        </div>
                        <strong>Tarik Dana</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#sendActionSheet">
                        <div class="icon-wrapper">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                        <strong>Bayar Tagihan</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exchangeActionSheet">
                        <div class="icon-wrapper bg-warning">
                            <ion-icon name="navigate-outline"></ion-icon>
                        </div>
                        <strong>Transfer Dana</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row mt-2 text-center">
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Total Dana</div>
                    <div class="value text-success">Rp. 1.000.000</div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Total Tagihan</span></div>
                    <div class="value text-danger">Rp. 500.000</div>
                </div>
            </div>
        </div>
    </div>

    <div class="section mt-4 mb-4">
        <div class="owl-carousel owl-theme owl-carousel-info">
            <div class="card bg-warning">
                <div class="card-body">
                    <h4>Pengumuman 1</h4>
                    Trigger it with;
                    <p>
                        <code>toastbox('toastID')</code>
                    </p>
                    <h4>Auto Close</h4>
                    Also, you can auto close it in any seconds after calls.
                    <br>
                    <strong>Example : </strong>
                    Auto close in 3 seconds.<br>
                    <code>toastbox('toastID', 3000)</code>
                </div>
            </div>
            <div class="card bg-warning">
                <div class="card-body">
                    <h4>Pengumuman 2</h4>
                    Trigger it with;
                    <p>
                        <code>toastbox('toastID')</code>
                    </p>
                    <h4>Auto Close</h4>
                    Also, you can auto close it in any seconds after calls.
                    <br>
                    <strong>Example : </strong>
                    Auto close in 3 seconds.<br>
                    <code>toastbox('toastID', 3000)</code>
                </div>
            </div>
            <div class="card bg-warning">
                <div class="card-body">
                    <h4>Pengumuman 3</h4>
                    Trigger it with;
                    <p>
                        <code>toastbox('toastID')</code>
                    </p>
                    <h4>Auto Close</h4>
                    Also, you can auto close it in any seconds after calls.
                    <br>
                    <strong>Example : </strong>
                    Auto close in 3 seconds.<br>
                    <code>toastbox('toastID', 3000)</code>
                </div>
            </div>
            <div class="card bg-warning">
                <div class="card-body">
                    <h4>Pengumuman 4</h4>
                    Trigger it with;
                    <p>
                        <code>toastbox('toastID')</code>
                    </p>
                    <h4>Auto Close</h4>
                    Also, you can auto close it in any seconds after calls.
                    <br>
                    <strong>Example : </strong>
                    Auto close in 3 seconds.<br>
                    <code>toastbox('toastID', 3000)</code>
                </div>
            </div>
        </div>
    </div>

    <div class="section mt-4 mb-4">
        <div class="section-heading">
            <h2 class="title">5 Transaksi Terakhir</h2>
            <a href="#" class="link">Lihat Semua</a>
        </div>
        <div class="card">
            <ul class="listview flush transparent no-line image-listview detailed-list mt-1 mb-1">
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

    <div class="section full mt-4 mb-4">
        <div class="section-heading padding">
            <h2 class="title">Info Terkini</h2>
            <a href="app-blog.html" class="link">Lihat Semua</a>
        </div>

        <div class="owl-carousel owl-theme owl-carousel-news" style="padding-left: 16px; padding-right: 16px;">
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news1.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">What will be the value of bitcoin in the next...</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news2.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Rules you need to know in business</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news5.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">10 easy ways to save your money</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news4.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Follow the financial agenda with...</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news5.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">What will be the value of bitcoin in the next...</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news1.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Rules you need to know in business</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news1.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">10 easy ways to save your money</h4>
                    </div>
                </div>
            </a>
            <a href="app-blog-post.html">
                <div class="blog-card">
                    <img src="{{ asset('public/template/mobile/assets/img/sample/news/news1.png') }}" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">Follow the financial agenda with...</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

@push('scripts_vendor')
    <script src="{{ asset('public/template/mobile/assets/js/plugins/OwlCarousel/owl.carousel.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        var owlInfo = $('.owl-carousel-info');
        owlInfo.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true
        });

        var owlNews = $('.owl-carousel-news');
        owlNews.owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true
        });
    </script>
@endpush
