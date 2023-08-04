@extends('backend.layouts.master')

@section('page_title')
    {{ __('Language') }}
@endsection

@section('section_header_title')
    {{ __('Language') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Language') }}</div>
@endsection

@section('section_body_title')
    {{ __('Create Language') }}
@endsection

@section('section_body_lead')
    {{ __('Create information about language on this page') }}
@endsection

@push('styles_vendor')
    <link rel="stylesheet" href="{{ asset('public/template/backend/assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Create Language') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('backend.language.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('backend.language.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Language') }}</label>
                            <select id="lang" name="lang"
                                class="form-control select2 @error('lang') is-invalid @enderror">
                                <option value="" selected disabled>-- Select --</option>
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
                            <div class="invalid-feedback">
                                {{ __('Please fill in your language') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                readonly>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="invalid-feedback">
                                {{ __('Please fill in your language name') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Slug') }}</label>
                            <input type="text" id="slug" name="slug"
                                class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                                readonly>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="invalid-feedback">
                                {{ __('Please fill in your language slug') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Is it default ?') }}</label>
                            <select name="default" class="form-control @error('default') is-invalid @enderror">
                                <option value="0" {{ old('default') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('default') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @error('default')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="invalid-feedback">
                                {{ __('Please fill in your default language') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Status') }}</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="invalid-feedback">
                                {{ __('Please fill in your language status') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary mt-3">
                                <i class="fas fa-save"></i> Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts_vendor')
    <script src="{{ asset('public/template/backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

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