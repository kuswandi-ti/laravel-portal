@extends('layouts.admin.auth')

@section('page_title')
    {{ __('admin.Member Admin Register') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="login-brand">
                <img src="{{ asset(config('common.path_template_admin') . 'assets/img/stisla-fill.svg') }}" alt="logo"
                    width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Member Admin Register') }}</h4>
                </div>

                <div class="card-body">
                    <x-alert-message />

                    <form method="POST" action="{{ route('member.register.post') }}">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">{{ __('admin.Full Name') }} <x-fill-field /></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('admin.Email') }} <x-fill-field /></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('admin.Password') }} <x-fill-field /></label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('admin.Password Confirmation') }}
                                        <x-fill-field /></label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="residence">{{ __('admin.Residence') }}
                                        <x-fill-field /></label>
                                    <select name="residence"
                                        class="form-control select2 @error('residence') is-invalid @enderror" required>
                                        <option value="" selected disabled>{{ __('admin.Choose one ...') }}</option>
                                        @foreach ($residences as $id => $name)
                                            <option value="{{ $id }}"
                                                {{ old('residence') == $id ? 'selected' : '' }}>
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('residence')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="area_name">{{ __('admin.Area Name, Cluster, or Others') }}
                                        <x-fill-field /></label>
                                    <input type="text" name="area_name"
                                        class="form-control @error('area_name') is-invalid @enderror"
                                        value="{{ old('area_name') }}" required>
                                    @error('area_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="package">{{ __('admin.Package') }}
                                        <x-fill-field /></label>
                                    <select name="package"
                                        class="form-control select2 @error('package') is-invalid @enderror" required>
                                        <option value="" selected disabled>{{ __('admin.Choose one ...') }}</option>
                                        @foreach ($packages as $id => $name)
                                            <option value="{{ $id }}"
                                                {{ old('package') == $id ? 'selected' : '' }}>
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('package')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="package_type">{{ __('admin.Package Type') }}
                                        <x-fill-field /></label>
                                    <select name="package_type"
                                        class="form-control select2 @error('package_type') is-invalid @enderror" required>
                                        <option value="" selected disabled>{{ __('admin.Choose one ...') }}</option>
                                        <option value="yearly" {{ old('package_type') == 'yearly' ? 'selected' : '' }}>
                                            {{ __('admin.Yearly') }}</option>
                                        <option value="monthly" {{ old('package_type') == 'monthly' ? 'selected' : '' }}>
                                            {{ __('admin.Monthly') }}</option>
                                    </select>
                                    @error('package_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('admin.Register') }}
                            </button>
                        </div>
                    </form>

                    <div class="text-center form-group">
                        <a href="{{ route('member.login') }}">
                            {{ __('admin.Login') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="simple-footer">
                {{ __('admin.Copyright') }} &copy; Stisla {{ date('Y') }}
            </div>
        </div>
    </div>
@endsection

@include('layouts.admin.includes.select2')
