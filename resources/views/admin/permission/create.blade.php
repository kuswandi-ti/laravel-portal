@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Permission') }}
@endsection

@section('section_header_title')
    {{ __('admin.Permission') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Permission') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Create Permission') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Create information about permission on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Create Permission') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.permission.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.permission.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('admin.Permission Name') }}</label>
                            <input type="text" id="permission_name" name="permission_name"
                                class="form-control @error('permission_name') is-invalid @enderror"
                                value="{{ old('permission_name') }}" required>
                            @error('permission_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('admin.Group Name') }}</label>
                            <input type="text" id="group_name" name="group_name"
                                class="form-control @error('group_name') is-invalid @enderror"
                                value="{{ old('group_name') }}" required>
                            @error('group_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="control-label">{{ __('admin.Guard Name') }}</div>
                            <div class="mt-2 custom-switches-stacked">
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" value="{{ getGuardNameAdmin() }}"
                                        class="custom-switch-input" checked>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-danger">{{ getGuardTextAdmin() }}</span>
                                </label>
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" value="{{ getGuardNameMember() }}"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-info">{{ getGuardTextMember() }}</span>
                                </label>
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" value="{{ getGuardNameUser() }}"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-info">{{ getGuardTextUser() }}</span>
                                </label>
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
