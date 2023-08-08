@extends('mobile.layouts.master')

@section('app_title', 'Transaksi')

@section('frontend_content')
    @includeIf('mobile.layouts.partials.title')

    <div class="section mt-2">
        <div class="section-title">2023</div>
        <div class="transactions">
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

    <div class="section mt-2 mb-4">
        <div class="section-title">2022</div>
        <div class="transactions">
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
@endsection
