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
    {{ __('Language') }}
@endsection

@section('section_body_lead')
    {{ __('Change information about language on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All Language') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('backend.language.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('Create') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <p>Write something here</p>
                </div>
            </div>
        </div>
    </div>
@endsection
