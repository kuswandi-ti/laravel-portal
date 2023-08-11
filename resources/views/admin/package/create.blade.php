@extends('admin.layouts.master')

@section('page_title')
    {{ __('Package') }}
@endsection

@section('section_header_title')
    {{ __('Package') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Package') }}</div>
@endsection

@section('section_body_title')
    {{ __('Update Package') }}
@endsection

@section('section_body_lead')
    {{ __('Update information about package on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Update Package') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.package.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.package.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('Package Name') }} <x-fill-field /></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-5">
                                <div class="alert alert-info">
                                    {{ __('Monthly') }}
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Staff Limit') }} <x-fill-field /></label>
                                    <select
                                        class="form-control select2 @error('staff_limit_per_month') is-invalid @enderror"
                                        name="staff_limit_per_month" required>
                                        <option value="No">{{ __('No') }}</option>
                                        <option value="Unlimited">{{ __('Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('staff_limit_per_month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('User Limit') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('user_limit_per_month') is-invalid @enderror"
                                        name="user_limit_per_month" required>
                                        <option value="No">{{ __('No') }}</option>
                                        <option value="Unlimited">{{ __('Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('user_limit_per_month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Wallet Amount Limit') }} <x-fill-field /></label>
                                    <select
                                        class="form-control select2 @error('wallet_amount_limit_per_month') is-invalid @enderror"
                                        name="wallet_amount_limit_per_month" required>
                                        <option value="No">{{ __('No') }}</option>
                                        <option value="Unlimited">{{ __('Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i * 100000 }}">{{ amountFormat($i * 100000) }}</option>
                                        @endfor
                                    </select>
                                    @error('wallet_amount_limit_per_month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 mt-3">
                                        <label class="custom-switch">
                                            <input type="radio" name="live_chat_per_month" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('Live Chat') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label class="custom-switch">
                                            <input type="radio" name="support_ticket_per_month" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('Support Ticket') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label class="custom-switch">
                                            <input type="radio" name="online_payment_per_month" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('Online Payment') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-5">
                                <div class="alert alert-info">
                                    {{ __('Yearly') }}
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Staff Limit') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('staff_limit_per_year') is-invalid @enderror"
                                        name="staff_limit_per_year" required>
                                        <option value="No">{{ __('No') }}</option>
                                        <option value="Unlimited">{{ __('Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('staff_limit_per_year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('User Limit') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('user_limit_per_year') is-invalid @enderror"
                                        name="user_limit_per_year" required>
                                        <option value="No">{{ __('No') }}</option>
                                        <option value="Unlimited">{{ __('Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('user_limit_per_year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Wallet Amount Limit') }} <x-fill-field /></label>
                                    <select
                                        class="form-control select2 @error('wallet_amount_limit_per_year') is-invalid @enderror"
                                        name="wallet_amount_limit_per_year" required>
                                        <option value="No">{{ __('No') }}</option>
                                        <option value="Unlimited">{{ __('Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i * 100000 }}">{{ amountFormat($i * 100000) }}</option>
                                        @endfor
                                    </select>
                                    @error('wallet_amount_limit_per_year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 mt-3">
                                        <label class="custom-switch">
                                            <input type="radio" name="live_chat_per_year" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('Live Chat') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label class="custom-switch">
                                            <input type="radio" name="support_ticket_per_year" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('Support Ticket') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label class="custom-switch">
                                            <input type="radio" name="online_payment_per_year" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('Online Payment') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('admin.includes.select2')
