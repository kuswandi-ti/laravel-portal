@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Member Staff') }}
@endsection

@section('section_header_title')
    {{ __('admin.Member Staff') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Member Staff') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Create Member Staff') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Create information about member staff on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Create Member Staff') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.staff.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('member.staff.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('admin.Member Staff Name') }} <x-fill-field /></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('admin.Member Staff Email') }} <x-fill-field /></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('admin.Password') }} <x-fill-field /></label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                                required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('admin.Confirmation Password') }} <x-fill-field /></label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                value="{{ old('password_confirmation') }}" required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="control-label">{{ __('admin.Member Staff Role') }}</div>
                            <div class="mt-2 custom-switches-stacked">
                                @foreach ($roles as $key => $item)
                                    <label class="custom-switch">
                                        <input type="radio" name="role" value="{{ $key }}"
                                            class="custom-switch-input" checked>
                                        <span class="custom-switch-indicator"></span>
                                        <span
                                            class="custom-switch-description {{ $item == getGuardTextUser() ? 'text-danger' : 'text-info' }}">{{ $item }}</span>
                                    </label>
                                @endforeach
                                @error('role')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
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
