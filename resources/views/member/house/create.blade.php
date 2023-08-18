@extends('layouts.admin.master')

@section('page_title')
    {{ __('House') }}
@endsection

@section('section_header_title')
    {{ __('House') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('House') }}</div>
@endsection

@section('section_body_title')
    {{ __('Create House') }}
@endsection

@section('section_body_lead')
    {{ __('Create information about house on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Create House') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.house.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('member.house.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('House Owner Name') }} <x-fill-field /></label>
                                    <input type="text" name="owner_name"
                                        class="form-control @error('owner_name') is-invalid @enderror"
                                        value="{{ old('owner_name') }}" required autofocus>
                                    @error('owner_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Street') }} <x-fill-field /></label>
                                    <select name="street"
                                        class="form-control select2 @error('street') is-invalid @enderror" required>
                                        <option value="" selected disabled>{{ __('Choose one ...') }}
                                        </option>
                                        @foreach ($streets as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('street') == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('street')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Block') }} <x-fill-field /></label>
                                    <select name="block" class="form-control select2 @error('block') is-invalid @enderror"
                                        required>
                                        <option value="" selected disabled>{{ __('Choose one ...') }}
                                        </option>
                                        @foreach ($blocks as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('block') == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('block')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('House Number') }} <x-fill-field /></label>
                                    <input type="text" name="no"
                                        class="form-control @error('no') is-invalid @enderror" value="{{ old('no') }}"
                                        required>
                                    @error('no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Address Others Info') }}</label>
                                    <textarea name="address_info" class="form-control @error('address_info') is-invalid @enderror" rows="3">{{ old('address_info') }}</textarea>
                                    @error('address_info')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Create') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('layouts.admin.includes.select2')