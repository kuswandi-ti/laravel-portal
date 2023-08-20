@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Profile') }}
@endsection

@section('section_header_title')
    {{ __('admin.Profile') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Profile') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Hi') }}, {{ $admin->name ?? '' }}
@endsection

@section('section_body_lead')
    {{ __('admin.Change information about yourself on this page') }}
@endsection

@section('content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" action="{{ route('admin.profile.update',auth()->guard('admin')->user()->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h4>{{ __('admin.Edit Profile') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <div id="image-preview" class="mx-auto image-preview">
                                    <label for="image-upload" id="image-label">{{ __('admin.Choose File') }}</label>
                                    <input type="file" name="image" id="image-upload">
                                    <input type="hidden" name="old_image" value="{{ $admin->image }}">
                                </div>
                                @error('image')
                                    <div class="mt-2 text-center text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <label>{{ __('admin.Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') ?? $admin->name }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('admin.Email') }} <span class="text-danger">(readonly)</span></label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email') ?? $admin->email }}" disabled>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('admin.Role') }} <span class="text-danger">(readonly)</span></label>
                                <input type="text" class="form-control" name="role"
                                    value="{{ old('role') ?? $admin->roles->first()->name }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="text-right card-footer">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('admin.Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-5">
            <div class="card">
                <form method="post" action="{{ route('admin.profile_password.update', $admin->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h4>{{ __('admin.Update Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>{{ __('admin.Current Password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" required>
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('admin.New Password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('admin.Confirm New Password') }} <span class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-right card-footer">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('admin.Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.upload_preview')
@include('layouts.admin.includes.upload_preview_admin')
