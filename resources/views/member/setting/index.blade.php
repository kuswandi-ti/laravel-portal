@extends('member.layouts.master')

@section('page_title')
    {{ __('Setting') }}
@endsection

@section('title')
    {{ __('Setting') }}
@endsection

@section('sub_title')
    {{ __('All application setting on this page') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Setting') }}</li>
@endsection

@includeIf('includes.select2')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="nav-icon fas fa-cog"></i>&nbsp;
                        {{ __('Setting') }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100 mr-2" id="vert-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="tabs-member-tab" data-toggle="pill" href="#tabs-member"
                                    role="tab" aria-controls="tabs-member" aria-selected="true">
                                    {{ __('Member') }}
                                </a>
                                <a class="nav-link" id="tabs-residence-tab" data-toggle="pill" href="#tabs-residence"
                                    role="tab" aria-controls="tabs-residence" aria-selected="false">
                                    {{ __('Residence') }}
                                </a>
                                <a class="nav-link" id="tabs-system-tab" data-toggle="pill" href="#tabs-system"
                                    role="tab" aria-controls="tabs-system" aria-selected="false">
                                    {{ __('System') }}
                                </a>
                                <a class="nav-link" id="tabs-notification-tab" data-toggle="pill" href="#tabs-notification"
                                    role="tab" aria-controls="tabs-notification" aria-selected="false">
                                    {{ __('Notification') }}
                                </a>
                                <a class="nav-link" id="tabs-payment-tab" data-toggle="pill" href="#tabs-payment"
                                    role="tab" aria-controls="tabs-payment" aria-selected="false">
                                    {{ __('Payment') }}
                                </a>
                                <a class="nav-link" id="tabs-logo-tab" data-toggle="pill" href="#tabs-logo" role="tab"
                                    aria-controls="tabs-logo" aria-selected="false">
                                    {{ __('Logo') }}
                                </a>
                                <a class="nav-link" id="tabs-role-permission-tab" data-toggle="pill"
                                    href="#tabs-role-permission" role="tab" aria-controls="tabs-role-permission"
                                    aria-selected="false">
                                    {{ __('Role & Permission') }}
                                </a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade active show" id="tabs-member" role="tabpanel"
                                    aria-labelledby="tabs-member-tab">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('Full Name') }} <x-fill-field /></label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value='{{ old('name') }}'>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('Email') }} <x-fill-field /></label>
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value='{{ old('email') }}'>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('Phone') }}</label>
                                                    <input type="text" name="phone"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        value="{{ old('phone') }}">
                                                    @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('Province') }} <x-fill-field /></label>
                                                    <select
                                                        class="form-control select2 @error('province') is-invalid @enderror"
                                                        style="width: 100%;" name="province" id="province"
                                                        placeholder="Choose ...">
                                                        <option value="" disabled selected>
                                                            {{ __('Choose one ...') }}</option>
                                                        @foreach ($provinces as $code => $name)
                                                            <option value="{{ $code }}"
                                                                {{ old('provinces') ?? !empty($setting['province']) ? ($setting['province'] == $name ? 'selected' : '') : '' }}>
                                                                {{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('province')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('City') }} <x-fill-field /></label>
                                                    <select
                                                        class="form-control select2 @error('city') is-invalid @enderror"
                                                        style="width: 100%;" name="city" id="city"
                                                        placeholder="Choose ..." value="{{ old('city') }}">
                                                    </select>
                                                    @error('city')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('District') }} <x-fill-field /></label>
                                                    <select
                                                        class="form-control select2 @error('district') is-invalid @enderror"
                                                        style="width: 100%;" name="district" id="district"
                                                        placeholder="Choose ..." value="{{ old('district') }}">
                                                    </select>
                                                    @error('district')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('Village') }} <x-fill-field /></label>
                                                    <select
                                                        class="form-control select2 @error('village') is-invalid @enderror"
                                                        style="width: 100%;" name="village" id="village"
                                                        placeholder="Choose ..." value="{{ old('village') }}">
                                                    </select>
                                                    @error('village')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('Full Address') }}</label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address') }}</textarea>
                                                    @error('address')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> {{ __('Save Changes') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tabs-residence" role="tabpanel"
                                    aria-labelledby="tabs-residence-tab">
                                    Residence
                                </div>
                                <div class="tab-pane fade" id="tabs-system" role="tabpanel"
                                    aria-labelledby="tabs-system-tab">
                                    System
                                </div>
                                <div class="tab-pane fade" id="tabs-notification" role="tabpanel"
                                    aria-labelledby="tabs-notification-tab">
                                    Notification
                                </div>
                                <div class="tab-pane fade" id="tabs-payment" role="tabpanel"
                                    aria-labelledby="tabs-payment-tab">
                                    Payment
                                </div>
                                <div class="tab-pane fade" id="tabs-logo" role="tabpanel"
                                    aria-labelledby="tabs-logo-tab">
                                    Logo
                                </div>
                                <div class="tab-pane fade" id="tabs-role-permission" role="tabpanel"
                                    aria-labelledby="tabs-role-permission-tab">
                                    Role & Permission
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@push('scripts')
    <script>
        $('body').on('change', '#province', function() {
            var province_code = this.value;
            $("#city").html('');
            $("#district").html('');
            $("#village").html('');
            $.ajax({
                url: "{{ route('member.setting.get_cities') }}",
                type: "POST",
                data: {
                    province_code: province_code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#city').html('<option value="">{{ __('Choose ...') }}</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city").append('<option value="' + value
                            .code + '">' + value.name + '</option>');
                    });
                    $('#district').html('<option value="">{{ __('Choose ...') }}</option>');
                    $('#village').html('<option value="">{{ __('Choose ...') }}</option>');
                }
            });
        });

        $('body').on('change', '#city', function() {
            var city_code = this.value;
            $("#district").html('');
            $("#village").html('');
            $.ajax({
                url: "{{ route('member.setting.get_districts') }}",
                type: "POST",
                data: {
                    city_code: city_code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#district').html('<option value="">{{ __('Choose ...') }}</option>');
                    $.each(result.districts, function(key, value) {
                        $("#district").append('<option value="' + value
                            .code + '">' + value.name + '</option>');
                    });
                    $('#village').html('<option value="">{{ __('Choose ...') }}</option>');
                }
            });
        });

        $('body').on('change', '#district', function() {
            var district_code = this.value;
            $("#village").html('');
            $.ajax({
                url: "{{ route('member.setting.get_villages') }}",
                type: "POST",
                data: {
                    district_code: district_code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#village').html('<option value="">{{ __('Choose ...') }}</option>');
                    $.each(result.villages, function(key, value) {
                        $("#village").append('<option value="' + value
                            .code + '">' + value.name + '</option>');
                    });
                }
            });
        });
    </script>
@endpush
