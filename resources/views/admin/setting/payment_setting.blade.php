@extends('layouts.admin.master')

@section('page_title')
    {{ __('Payment Setting') }}
@endsection

@push('header_back')
    <div class="section-header-back">
        <a href="javascript:history.back()" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
@endpush

@section('section_header_title')
    {{ __('Payment Setting') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Payment Setting') }}</div>
@endsection

@section('section_body_title')
    {{ __('Payment Setting') }}
@endsection

@section('section_body_lead')
    {{ __('View information about payment setting on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="setting1" data-toggle="tab" href="#tab-setting1" role="tab"
                                aria-selected="true">
                                {{ __('Midtrans') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="setting2" data-toggle="tab" href="#tab-setting2" role="tab"
                                aria-selected="false">
                                {{ __('Xendit') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form method="POST" action="{{ route('admin.payment_setting.update') }}">
                @csrf
                @method('PUT')

                <div class="tab-content no-padding" id="myTab2Content">
                    <div class="tab-pane fade show active" id="tab-setting1" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Midtrans') }}</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Mode') }} <span class="text-danger">*</span></label>
                                            <select id="midtrans_mode" name="midtrans_mode"
                                                class="form-control @error('midtrans_mode') is-invalid @enderror" required>
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                <option value="sandbox"
                                                    {{ !empty($setting['midtrans_mode']) ? ($setting['midtrans_mode'] == 'sandbox' ? 'selected' : '') : '' }}>
                                                    {{ __('Sandbox') }}</option>
                                                <option value="production"
                                                    {{ !empty($setting['midtrans_mode']) ? ($setting['midtrans_mode'] == 'production' ? 'selected' : '') : '' }}>
                                                    {{ __('Production') }}</option>
                                            </select>
                                            @error('midtrans_mode')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Merchant ID') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="midtrans_merchant_id" name="midtrans_merchant_id"
                                                class="form-control @error('midtrans_merchant_id') is-invalid @enderror"
                                                value="{{ !empty($setting['midtrans_merchant_id']) ? $setting['midtrans_merchant_id'] : '' }}"
                                                required>
                                            @error('midtrans_merchant_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Client Key') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="midtrans_client_key" name="midtrans_client_key"
                                                class="form-control @error('midtrans_client_key') is-invalid @enderror"
                                                value="{{ !empty($setting['midtrans_client_key']) ? $setting['midtrans_client_key'] : '' }}"
                                                required>
                                            @error('midtrans_client_key')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Server Key') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="midtrans_server_key" name="midtrans_server_key"
                                                class="form-control @error('midtrans_server_key') is-invalid @enderror"
                                                value="{{ !empty($setting['midtrans_server_key']) ? $setting['midtrans_server_key'] : '' }}"
                                                required>
                                            @error('midtrans_server_key')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="tab-setting2" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Xendit') }}</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> {{ __('Save Changes') }}
                </button>
            </form>
        </div>
    </div>
@endsection

<x-swal />
