@extends('member.layouts.master')

@section('page_title')
    {{ __('Role') }}
@endsection

@section('title')
    {{ __('Role') }}
@endsection

@section('sub_title')
    {{ __('All application role on this page') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Role') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('member.role.store') }}">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="nav-icon fas fa-user-cog"></i>&nbsp;
                            {{ __('Create Role') }}
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('member.role.index') }}" class="btn btn-warning">
                                <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Role Name') }} <x-fill-field /></label>
                                    <input type="text" name="role_name"
                                        class="form-control @error('role_name') is-invalid @enderror"
                                        value="{{ old('role_name') }}" required>
                                    @error('role_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Guard Name') }} <x-fill-field /></label>
                                    <div class="custom-switches-stacked">
                                        <div class="custom-control custom-switch">
                                            <input type="radio" class="custom-control-input" name="guard_name"
                                                id="guard_member" value="member">
                                            <label class="custom-control-label text-danger"
                                                for="guard_member">{{ __('Member') }}</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="radio" class="custom-control-input" name="guard_name"
                                                id="guard_web" value="web" checked>
                                            <label class="custom-control-label text-warning"
                                                for="guard_web">{{ __('Web') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="permission_member">
                                    <div class="control-label mb-1"><strong>{{ __('Permission Member') }}</strong></div>
                                    @foreach ($permissions_member as $key => $permission)
                                        <div class="form-group">
                                            <div class="control-label text-danger">{{ __($key) }}</div>
                                            <div class="row">
                                                @foreach ($permission->sortBy('name') as $item)
                                                    <div class="col-md-3">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="permissions[]" id="{{ __($item->id) }}"
                                                                value="{{ __($item->name) }}">
                                                            <label class="custom-control-label"
                                                                for="{{ __($item->id) }}">{{ __($item->name) }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div id="permission_web">
                                    <div class="control-label mb-1"><strong>{{ __('Permission Web') }}</strong></div>
                                    @foreach ($permissions_web as $key => $permission)
                                        <div class="form-group">
                                            <div class="control-label text-warning">{{ __($key) }}</div>
                                            <div class="row">
                                                @foreach ($permission->sortBy('name') as $item)
                                                    <div class="col-md-3">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="permissions[]" id="{{ __($item->id) }}"
                                                                value="{{ __($item->name) }}">
                                                            <label class="custom-control-label"
                                                                for="{{ __($item->id) }}">{{ __($item->name) }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#permission_member').hide();
            $('#permission_web').show();

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
