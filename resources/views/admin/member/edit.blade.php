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
    {{ __('Edit Member User') }}
@endsection

@section('section_body_lead')
    {{ __('Update information about user on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Update Member User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.member.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.member.update', $member->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Member User Name') }} <x-fill-field /></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') ?? $member->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Member User Email') }} <x-fill-field /></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') ?? $member->email }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="control-label">{{ __('Member User Role') }} <x-fill-field /></div>
                            <div class="mt-2 custom-switches-stacked">
                                @foreach ($roles as $key => $item)
                                    <label class="custom-switch">
                                        <input type="radio" name="role" value="{{ $key }}"
                                            class="custom-switch-input"
                                            {{ in_array($item, $member_role) ? 'checked' : '' }}>
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
                            <i class="fas fa-save"></i> {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
