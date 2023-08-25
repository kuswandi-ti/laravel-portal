@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Member Staff') }}
@endsection

@section('section_header_title')
    {{ __('admin.Member Staff') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Member Staff') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Edit Member Staff') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Update information about member staff on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Edit Member Staff') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.staff.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('member.staff.update', $staff->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('admin.Member Staff Name') }} <x-fill-field /></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') ?? $staff->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('admin.Member Staff Email') }} <x-fill-field /></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') ?? $staff->email }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('admin.House') }} <x-fill-field /></label>
                            <select name="house" class="form-control select2 @error('house') is-invalid @enderror"
                                required>
                                <option value="" selected disabled>{{ __('admin.Choose one ...') }}
                                </option>
                                @foreach ($houses as $house)
                                    <option value="{{ $house->id }}"
                                        {{ $house->id == $staff->house_id ? 'selected' : '' }}>
                                        {{ $house->owner_name }}</option>
                                @endforeach
                            </select>
                            @error('house')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="control-label">{{ __('admin.Member Staff Role') }}</div>
                            <div class="mt-2 custom-switches-stacked">
                                @foreach ($roles as $key => $item)
                                    <label class="custom-switch">
                                        <input type="radio" name="role" value="{{ $key }}"
                                            class="custom-switch-input"
                                            {{ $staff->roles->pluck('id')->first() == $key ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span
                                            class="custom-switch-description {{ $item == getGuardTextUser() ? 'text-danger' : 'text-info' }}">{{ $item }}</span>
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
                            <i class="fas fa-save"></i> {{ __('admin.Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('layouts.admin.includes.select2')
