@extends('backend.layouts.master')

@section('section-header-title')
    {{ __('Profile') }}
@endsection

@section('section-header-breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Profile') }}</div>
@endsection

@section('section-body-title')
    Hi, {{ $user->name ?? '' }}
@endsection

@section('section-body-lead', 'Change information about yourself on this page.')

@push('styles_vendor')
    {{-- <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/template/backend/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}"> --}}
@endpush

@section('backend_content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                        <h4>{{ __('Edit Profile') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <div id="image-preview" class="image-preview mx-auto">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name') ?? $user->name }}" required="">
                                <div class="invalid-feedback">
                                    {{ __('Please fill in the name') }}
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email') ?? $user->email }}" required="">
                                <div class="invalid-feedback">
                                    {{ __('Please fill in the email') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-5">
            <div class="card">
                <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                        <h4>{{ __('Update Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>{{ __('Old Password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="old-password" required="">
                                <div class="invalid-feedback">
                                    {{ __('Please fill in the old password') }}
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('New Password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="new-password" required="">
                                <div class="invalid-feedback">
                                    {{ __('Please fill in the new password') }}
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Confirm New Password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="confirm-new-password" required="">
                                <div class="invalid-feedback">
                                    {{ __('Please fill in the confirm new password') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts_vendor')
    {{-- <script src="{{ asset('public/template/backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script> --}}
    <script
        src="{{ asset('public/template/backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}">
    </script>
    {{-- <script
        src="{{ asset('public/template/backend/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}">
    </script> --}}
@endpush

@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
