@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Member User') }}
@endsection

@section('section_header_title')
    {{ __('admin.Member User') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Member User') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Edit Member User') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Update information about user on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Update Member User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.member.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.member.update', $member->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('admin.Member Name') }} <x-fill-field /></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') ?? $member->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('admin.Member Email') }} <x-fill-field /></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') ?? $member->email }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('admin.Area') }} <x-fill-field /></label>
                            <select class="form-control select2 @error('area') is-invalid @enderror" name="area"
                                id="area" placeholder="Choose ...">
                                <option value="" disabled selected>
                                    {{ __('admin.Choose one ...') }}</option>
                                @foreach ($areas as $id => $name)
                                    <option value="{{ $id }}" {{ $member->area_id == $id ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                @endforeach
                            </select>
                            @error('area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="control-label">{{ __('admin.Member Role') }} <x-fill-field /></div>
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
                            <i class="fas fa-save"></i> {{ __('admin.Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('layouts.admin.includes.select2')
