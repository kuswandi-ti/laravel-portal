@extends('layouts.admin.master')

@section('page_title')
    {{ __('Role') }}
@endsection

@section('section_header_title')
    {{ __('Role') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Role') }}</div>
@endsection

@section('section_body_title')
    {{ __('Edit Role') }}
@endsection

@section('section_body_lead')
    {{ __('Update information about user role on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Edit Role') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.role.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('member.role.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Role Name') }} <x-fill-field /></label>
                            <input type="text" name="role_name"
                                class="form-control @error('role_name') is-invalid @enderror"
                                value="{{ old('role_name') ?? $role->name }}" required>
                            @error('role_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="control-label">{{ __('Guard Name') }} <span
                                    class="text-danger">{{ __('(disabled)') }}</span></div>
                            <div class="mt-2 custom-switches-stacked">
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" id="guard_member" value="member"
                                        class="custom-switch-input" {{ $role->guard_name == 'member' ? 'checked' : '' }}
                                        disabled>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-danger">{{ __('Member') }}</span>
                                </label>
                                <label class="custom-switch">
                                    <input type="radio" name="guard_name" id="guard_web" value="web"
                                        class="custom-switch-input" {{ $role->guard_name == 'web' ? 'checked' : '' }}
                                        disabled>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-info">{{ __('Web') }}</span>
                                </label>
                            </div>
                        </div>

                        <div id="permission_member">
                            @foreach ($permissions_member as $key => $permission)
                                <div class="form-group">
                                    <div class="control-label text-danger">{{ __($key) }}</div>
                                    <div class="row">
                                        @foreach ($permission as $item)
                                            <div class="col-md-3">
                                                <label class="mt-2 custom-switch">
                                                    <input value="{{ __($item->name) }}" type="checkbox"
                                                        name="permissions[]" class="custom-switch-input"
                                                        {{ in_array($item->name, $roles_permissions) ? 'checked' : '' }}>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">{{ __($item->name) }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="permission_web">
                            @foreach ($permissions_web as $key => $permission)
                                <div class="form-group">
                                    <div class="control-label text-info">{{ __($key) }}</div>
                                    <div class="row">
                                        @foreach ($permission as $item)
                                            <div class="col-md-3">
                                                <label class="mt-2 custom-switch">
                                                    <input value="{{ __($item->name) }}" type="checkbox"
                                                        name="permissions[]" class="custom-switch-input"
                                                        {{ in_array($item->name, $roles_permissions) ? 'checked' : '' }}>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">{{ __($item->name) }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
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

@push('scripts')
    <script>
        $(document).ready(function() {
            if ($('#guard_member').prop('checked')) {
                $('#permission_member').show();
                $('#permission_web').hide();
            } else {
                $('#permission_member').hide();
                $('#permission_web').show();
            }

            $('input[type=radio][name=guard_name]').on('change', function() {
                switch ($(this).val()) {
                    case 'member':
                        $('#permission_member').show();
                        $('#permission_web').hide();
                        break;
                    case 'web':
                        $('#permission_member').hide();
                        $('#permission_web').show();
                        break;
                }
            });
        })
    </script>
@endpush
