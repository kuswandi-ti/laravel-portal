@extends('admin.layouts.master')

@section('page_title')
    {{ __('Languages') }}
@endsection

@section('section_header_title')
    {{ __('Languages') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Languages') }}</div>
@endsection

@section('section_body_title')
    {{ __('Languages') }}
@endsection

@section('section_body_lead')
    {{ __('View information about language on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All Languages') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.language.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('Create') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>{{ __('Language Name') }}</th>
                                    <th class="text-center">{{ __('Language Code') }}</th>
                                    <th class="text-center">{{ __('Default') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($languages as $language)
                                    <tr>
                                        <td class="text-center">{{ $language->id }}</td>
                                        <td>{{ $language->name }}</td>
                                        <td class="text-center">{{ $language->lang }}</td>
                                        <td class="text-center">
                                            @if ($language->default == 1)
                                                <div class="badge badge-primary">{{ __('Yes') }}</div>
                                            @else
                                                <div class="badge badge-warning">{{ __('No') }}</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($language->status == 1)
                                                <div class="badge badge-success">{{ __('Active') }}</div>
                                            @else
                                                <div class="badge badge-danger">{{ __('Inactive') }}</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.language.edit', $language->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.language.destroy', $language->id) }}"
                                                class="btn btn-danger btn-sm delete_item"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('admin.includes.datatable')
