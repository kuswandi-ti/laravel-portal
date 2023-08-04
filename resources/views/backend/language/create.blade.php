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
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Language') }}</label>
                            <select class="form-control">
                                <option>-- Select --</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Slug') }}</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Is it default ?') }}</label>
                            <select class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Status') }}</label>
                            <select class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
