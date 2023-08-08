@extends('mobile.layouts.master')

@section('app_title', 'Pengaturan')

@section('frontend_content')
    @includeIf('mobile.layouts.partials.title')

    <div class="section mt-3 text-center">
        <div class="avatar-section">
            <a href="#">
                <img src="{{ asset('public/template/mobile/assets/img/sample/avatar/avatar1.jpg') }}" alt="avatar"
                    class="imaged w100 rounded">
                <span class="button">
                    <ion-icon name="camera-outline"></ion-icon>
                </span>
            </a>
        </div>
    </div>

    <div class="listview-title mt-1">Tema</div>
    <ul class="listview image-listview text inset no-line">
        <li>
            <div class="item">
                <div class="in">
                    <div>Mode Gelap</div>
                    <div class="form-check form-switch  ms-2">
                        <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                        <label class="form-check-label" for="darkmodeSwitch"></label>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <div class="listview-title mt-1">Notifikasi</div>
    <ul class="listview image-listview text inset">
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        Pengingat Tagihan
                        <div class="text-muted">
                            Kirim notifikasi jika sudah mendekati tanggal jatuh tempo tagihan
                        </div>
                    </div>
                    <div class="form-check form-switch  ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                        <label class="form-check-label" for="SwitchCheckDefault1"></label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        Notifikasi Pembayaran
                        <div class="text-muted">
                            Terima notifikasi jika proses pembayaran sukses
                        </div>
                    </div>
                    <div class="form-check form-switch  ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                        <label class="form-check-label" for="SwitchCheckDefault1"></label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Nada Notifikasi</div>
                    <span class="text-primary">Beep</span>
                </div>
            </a>
        </li>
    </ul>

    <div class="listview-title mt-1">Pengaturan Profil</div>
    <ul class="listview image-listview text inset">
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Perbaharui Username</div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Perbaharui Alamat E-mail</div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Perbaharui Alamat</div>
                </div>
            </a>
        </li>
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        Sembunyikan Informasi Penting Profil
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault2">
                        <label class="form-check-label" for="SwitchCheckDefault2"></label>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <div class="listview-title mt-1">Keamanan</div>
    <ul class="listview image-listview text mb-2 inset">
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Perbaharui Password</div>
                </div>
            </a>
        </li>
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        Verifikasi 2 Langkah
                    </div>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked />
                        <label class="form-check-label" for="SwitchCheckDefault3"></label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#" class="item" onclick="document.querySelector('#form-logout').submit()">
                <div class="in">
                    <div>
                        <form action="#" method="post" id="form-logout">
                            @csrf
                            Keluar di Semua Perangkat
                        </form>
                    </div>
                </div>
            </a>
        </li>
    </ul>

    <div class="listview-title mt-1">Bantuan & Saran</div>
    <ul class="listview image-listview text mb-4 inset">
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Pusat Bantuan</div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Ikuti Fanpage Kami</div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="item">
                <div class="in">
                    <div>Nilai Kami</div>
                </div>
            </a>
        </li>
    </ul>
@endsection
