@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Cash & Bank') }}
@endsection

@section('section_header_title')
    {{ __('admin.Cash & Bank') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Cash & Bank') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Edit Cash & Bank') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Update information about cash & bank on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Edit Cash & Bank') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.bank.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.bank.update', $bank->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('admin.Cash Bank Code') }} <x-fill-field /></label>
                                    <input type="text" name="code"
                                        class="form-control @error('code') is-invalid @enderror"
                                        value="{{ old('code') ?? $bank->code }}" required autofocus>
                                    @error('code')
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
                                    <label>{{ __('admin.Cash Bank Name') }} <x-fill-field /></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $bank->name }}" required>
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
                                    <label>{{ __('admin.Type') }} <x-fill-field /></label>
                                    <select class="form-control @error('type') is-invalid @enderror" name="type"
                                        id="type" placeholder="Choose ..." required>
                                        <option value="" disabled selected>
                                            {{ __('admin.Choose one ...') }}</option>
                                        <option value="bank"
                                            {{ old('type') == 'bank' ? 'selected' : ($bank->type == 'bank' ? 'selected' : '') }}>
                                            {{ __('admin.Bank') }}</option>
                                        <option value="cash"
                                            {{ old('type') == 'cash' ? 'selected' : ($bank->type == 'cash' ? 'selected' : '') }}>
                                            {{ __('admin.Cash') }}</option>
                                        <option value="other"
                                            {{ old('type') == 'other' ? 'selected' : ($bank->type == 'other' ? 'selected' : '') }}>
                                            {{ __('admin.Other') }}</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('admin.Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<x-swal />
