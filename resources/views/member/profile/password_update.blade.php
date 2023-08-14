@extends('member.layouts.master')

@section('page_title')
    {{ __('Profile') }}
@endsection

@section('title')
    {{ __('Profile') }}
@endsection

@section('sub_title')
    {{ __('Password profile setting on this page') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
@endsection

@includeIf('includes.select2')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="nav-icon fas fa-cog"></i>&nbsp;
                        {{ __('Change Password') }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <form method="post"
                                action="{{ route('member.profile_password.update',auth()->guard('member')->user()->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ __('Current Password') }} <x-fill-field /></label>
                                            <input type="password" name="current_password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                required>
                                            @error('current_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ __('New Password') }} <x-fill-field /></label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ __('Confirm New Password') }} <x-fill-field /></label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                required>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-3 row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> {{ __('Save Changes') }}
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />
