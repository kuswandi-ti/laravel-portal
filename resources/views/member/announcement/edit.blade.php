@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Announcement') }}
@endsection

@section('section_header_title')
    {{ __('admin.Announcement') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Announcement') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Edit Announcement') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Update information about announcement on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Edit Announcement') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.announcement.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('member.announcement.update', $announcement->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('admin.Title') }} <x-fill-field /></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') ?? $announcement->title }}" required autofocus>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('admin.Content') }} <x-fill-field /></label>
                                    <textarea class="form-control summernote @error('body') is-invalid @enderror" name="body">{{ old('body') ?? $announcement->body }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('admin.Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('layouts.admin.includes.summernote')
