@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Block') }}
@endsection

@section('section_header_title')
    {{ __('admin.Block') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Block') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Edit Block') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Update information about block on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Edit Block') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.block.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('member.block.update', $block->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('admin.Block Name') }} <x-fill-field /></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') ?? $block->name }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
