@extends('backend.layouts.master')

@section('page_title')
    {{ __('Admin User') }}
@endsection

@section('section_header_title')
    {{ __('Admin User') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Admin User') }}</div>
@endsection

@section('section_body_title')
    {{ __('Create Admin User') }}
@endsection

@section('section_body_lead')
    {{ __('Update information about admin user on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Update Admin User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('backend.admin.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('backend.admin.update', $admin->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Admin User Name') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') ?? $admin->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Admin User Email') }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') ?? $admin->email }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="control-label">{{ __('Admin User Role') }}</div>
                            <div class="mt-2 custom-switches-stacked">
                                @foreach ($roles as $key => $item)
                                    <label class="custom-switch">
                                        <input type="radio" name="role" value="{{ $key }}"
                                            class="custom-switch-input"
                                            {{ in_array($item, $admin_role) ? 'checked' : '' }}>
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

                        <div class="form-group">
                            <button class="mt-3 btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
