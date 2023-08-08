@extends('admin.layouts.master')

@section('page_title')
    {{ __('Permission') }}
@endsection

@section('section_header_title')
    {{ __('Permission') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Permission') }}</div>
@endsection

@section('section_body_title')
    {{ __('Edit Permission') }}
@endsection

@section('section_body_lead')
    {{ __('Update information about permission on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Edit Permission') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.permission.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.permission.update', $permission->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Permission Name') }}</label>
                            <input type="text" id="permission_name" name="permission_name"
                                class="form-control @error('permission_name') is-invalid @enderror"
                                value="{{ old('permission_name') ?? $permission->name }}" required>
                            @error('permission_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Group Name') }}</label>
                            <input type="text" id="group_name" name="group_name"
                                class="form-control @error('group_name') is-invalid @enderror"
                                value="{{ old('group_name') ?? $permission->group_name }}" required>
                            @error('group_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="control-label">{{ __('Guard Name') }}</div>
                            <div class="mt-2 custom-switches-stacked">
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" value="admin" class="custom-switch-input"
                                        {{ $permission->guard_name == 'admin' ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-danger">{{ __('Admin') }}</span>
                                </label>
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" value="staff" class="custom-switch-input"
                                        {{ $permission->guard_name == 'staff' ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-info">{{ __('Staff') }}</span>
                                </label>
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" value="web" class="custom-switch-input"
                                        {{ $permission->guard_name == 'web' ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-primary">{{ __('Web') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
