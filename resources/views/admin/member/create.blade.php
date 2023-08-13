@extends('admin.layouts.master')

@section('page_title')
    {{ __('Member User') }}
@endsection

@section('section_header_title')
    {{ __('Member User') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Member User') }}</div>
@endsection

@section('section_body_title')
    {{ __('Create Member User') }}
@endsection

@section('section_body_lead')
    {{ __('Create information about member user on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Create Member User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.member.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.member.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Member Name') }} <x-fill-field /></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Member Email') }} <x-fill-field /></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Password') }} <x-fill-field /></label>
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
                            <label>{{ __('Confirmation Password') }} <x-fill-field /></label>
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
                            <label>{{ __('Area') }} <x-fill-field /></label>
                            <select class="form-control select2 @error('area') is-invalid @enderror" name="area"
                                id="area" placeholder="Choose ...">
                                <option value="" disabled selected>
                                    {{ __('Choose one ...') }}</option>
                                @foreach ($areas as $id => $name)
                                    <option value="{{ $id }}" {{ old('area') == $id ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                @endforeach
                            </select>
                            @error('area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="control-label">{{ __('Member Role') }} <x-fill-field /></div>
                            <div class="mt-2 custom-switches-stacked">
                                @foreach ($roles as $key => $item)
                                    <label class="custom-switch">
                                        <input type="radio" name="role" value="{{ $key }}"
                                            class="custom-switch-input" checked>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description text-primary">{{ $item }}</span>
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
                            <i class="fas fa-save"></i> {{ __('Create') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('admin.includes.select2')
