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
                                <a class="nav-link active" id="tabs-area-tab" data-toggle="pill" href="#tabs-area"
                                    role="tab" aria-controls="tabs-area" aria-selected="true">
                                    {{ __('Area') }}
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
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade active show" id="tabs-area" role="tabpanel"
                                    aria-labelledby="tabs-area-tab">
                                    <form method="post" action="{{ route('member.setting_area.update', $area->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('Area Name, Cluster, or Others') }}
                                                        <x-fill-field /></label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value='{{ old('name') ?? $area->name }}' required>
                                                    @error('name')
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
                                                    <label>{{ __('Residence') }}</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value='{{ $area->residence->name }}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('RT') }} <x-fill-field /></label>
                                                    <input type="text" name="rt"
                                                        class="form-control @error('rt') is-invalid @enderror"
                                                        value='{{ old('rt') ?? $area->rt }}' required>
                                                    @error('rt')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('RW') }} <x-fill-field /></label>
                                                    <input type="text" name="rw"
                                                        class="form-control @error('rw') is-invalid @enderror"
                                                        value='{{ old('rw') ?? $area->rw }}' required>
                                                    @error('rw')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('Postal Code') }} <x-fill-field /></label>
                                                    <input type="text" name="postal_code"
                                                        class="form-control @error('postal_code') is-invalid @enderror"
                                                        value='{{ old('postal_code') ?? $area->postal_code }}' required>
                                                    @error('postal_code')
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
                                                    <label>{{ __('Full Address') }} <x-fill-field /></label>
                                                    <textarea class="form-control @error('full_address') is-invalid @enderror" name="full_address" rows="3" required>{{ old('full_address') ?? $area->full_address }}</textarea>
                                                    @error('full_address')
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
                                                    <label>{{ __('Province') }}</label>
                                                    <input type="text" name="province" class="form-control"
                                                        value='{{ $area->province->name }}' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('City') }}</label>
                                                    <input type="text" name="city" class="form-control"
                                                        value='{{ $area->city->name }}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('District') }}</label>
                                                    <input type="text" name="district" class="form-control"
                                                        value='{{ $area->district->name }}' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>{{ __('Village') }}</label>
                                                    <input type="text" name="village" class="form-control"
                                                        value='{{ $area->village->name }}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> {{ __('Save Changes') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />
