@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Package') }}
@endsection

@section('section_header_title')
    {{ __('admin.Package') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Package') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Update Package') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Update information about package on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Update Package') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.package.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.package.store') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('admin.Package Name') }} <x-fill-field /></label>
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
                            <div class="mb-5 col-md-6">
                                <div class="alert alert-info">
                                    {{ __('admin.Monthly') }}
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin.Staff Limit') }} <x-fill-field /></label>
                                    <select
                                        class="form-control select2 @error('staff_limit_per_month') is-invalid @enderror"
                                        name="staff_limit_per_month" required>
                                        <option value="no">{{ __('admin.No') }}</option>
                                        <option value="unlimited">{{ __('admin.Unlimited') }}</option>
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
                                    <label>{{ __('admin.User Limit') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('user_limit_per_month') is-invalid @enderror"
                                        name="user_limit_per_month" required>
                                        <option value="no">{{ __('admin.No') }}</option>
                                        <option value="unlimited">{{ __('admin.Unlimited') }}</option>
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
                                    <label>{{ __('admin.Wallet Amount Limit') }} <x-fill-field /></label>
                                    <select
                                        class="form-control select2 @error('wallet_amount_limit_per_month') is-invalid @enderror"
                                        name="wallet_amount_limit_per_month" required>
                                        <option value="unlimited">{{ __('admin.Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i * 100000 }}">{{ formatAmount($i * 100000) }}</option>
                                        @endfor
                                    </select>
                                    @error('wallet_amount_limit_per_month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin.Cost Per Month') }} <x-fill-field /></label>
                                    <input type="text" name="cost_per_month"
                                        class="form-control @error('cost_per_month') is-invalid @enderror"
                                        value="{{ old('cost_per_month') ?? '0' }}" required>
                                    @error('cost_per_month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="mt-3 form-group col-md-4">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="live_chat_per_month" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('admin.Live Chat') }}</span>
                                        </label>
                                    </div>
                                    <div class="mt-3 form-group col-md-4">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="support_ticket_per_month" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('admin.Support Ticket') }}</span>
                                        </label>
                                    </div>
                                    <div class="mt-3 form-group col-md-4">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="online_payment_per_month" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('admin.Online Payment') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 col-md-6">
                                <div class="alert alert-info">
                                    {{ __('admin.Yearly') }}
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin.Staff Limit') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('staff_limit_per_year') is-invalid @enderror"
                                        name="staff_limit_per_year" required>
                                        <option value="no">{{ __('admin.No') }}</option>
                                        <option value="unlimited">{{ __('admin.Unlimited') }}</option>
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
                                    <label>{{ __('admin.User Limit') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('user_limit_per_year') is-invalid @enderror"
                                        name="user_limit_per_year" required>
                                        <option value="no">{{ __('admin.No') }}</option>
                                        <option value="unlimited">{{ __('admin.Unlimited') }}</option>
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
                                    <label>{{ __('admin.Wallet Amount Limit') }} <x-fill-field /></label>
                                    <select
                                        class="form-control select2 @error('wallet_amount_limit_per_year') is-invalid @enderror"
                                        name="wallet_amount_limit_per_year" required>
                                        <option value="unlimited">{{ __('admin.Unlimited') }}</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i * 100000 }}">{{ formatAmount($i * 100000) }}</option>
                                        @endfor
                                    </select>
                                    @error('wallet_amount_limit_per_year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin.Cost Per Year') }} <x-fill-field /></label>
                                    <input type="text" name="cost_per_year"
                                        class="form-control @error('cost_per_year') is-invalid @enderror"
                                        value="{{ old('cost_per_year') ?? '0' }}" required>
                                    @error('cost_per_year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="mt-3 form-group col-md-4">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="live_chat_per_year" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ __('admin.Live Chat') }}</span>
                                        </label>
                                    </div>
                                    <div class="mt-3 form-group col-md-4">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="support_ticket_per_year" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('admin.Support Ticket') }}</span>
                                        </label>
                                    </div>
                                    <div class="mt-3 form-group col-md-4">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="online_payment_per_year" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('admin.Online Payment') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('admin.Create') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.select2')
