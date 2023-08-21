@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Language') }}
@endsection

@section('section_header_title')
    {{ __('admin.Language') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Language') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Create Language') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Create information about language on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Create Language') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.language.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.language.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('admin.Language') }}</label>
                            <select id="lang" name="lang"
                                class="form-control select2 @error('lang') is-invalid @enderror">
                                <option value="" selected disabled>{{ __('admin.Choose one ...') }}</option>
                                @foreach (config('language') as $key => $lang)
                                    <option value="{{ $key }}" {{ old('lang') == $key ? 'selected' : '' }}>
                                        {{ $lang['name'] }}</option>
                                @endforeach
                            </select>
                            @error('lang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('admin.Name') }} <span class="text-danger">({{ __('readonly') }})</span></label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                readonly required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('admin.Slug') }} <span class="text-danger">({{ __('readonly') }})</span></label>
                            <input type="text" id="slug" name="slug"
                                class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                                readonly required>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('admin.Is it default ?') }}</label>
                            <select name="default" class="form-control @error('default') is-invalid @enderror">
                                <option value="0" {{ old('default') == '0' ? 'selected' : '' }}>{{ __('admin.No') }}
                                </option>
                                <option value="1" {{ old('default') == '1' ? 'selected' : '' }}>{{ __('admin.Yes') }}
                                </option>
                            </select>
                            @error('default')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('admin.Status') }}</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                    {{ __('admin.Active') }}
                                </option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                    {{ __('admin.Inactive') }}
                                </option>
                            </select>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

@include('layouts.admin.includes.select2')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#lang').on('change', function() {
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
            });
        });
    </script>
@endpush
