@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Languages') }}
@endsection

@section('section_header_title')
    {{ __('admin.Languages') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Languages') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Languages') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about language on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Languages') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.language.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('admin.Create') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%"><i class="fas fa-list-ol"></i></th>
                                    <th class="text-center" width="12%"><i class="fas fa-cogs"></i></th>
                                    <th>{{ __('admin.Language Name') }}</th>
                                    <th class="text-center">{{ __('admin.Language Code') }}</th>
                                    <th class="text-center">{{ __('admin.Default') }}</th>
                                    <th class="text-center" width="8%">{{ __('admin.Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($languages as $language)
                                    <tr>
                                        <td class="text-center" width="10%">{{ $loop->iteration }}</td>
                                        <td class="text-center" width="12%">
                                            <a href="{{ route('admin.language.edit', $language->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.language.destroy', $language->id) }}"
                                                class="btn btn-danger btn-sm delete_item"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td>{{ $language->name }}</td>
                                        <td class="text-center">{{ $language->lang }}</td>
                                        <td class="text-center" width="8%">
                                            @if ($language->default == 1)
                                                <div class="badge badge-primary">{{ __('admin.Yes') }}</div>
                                            @else
                                                <div class="badge badge-warning">{{ __('admin.No') }}</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($language->status == 1)
                                                <div class="badge badge-success">{{ __('admin.Active') }}</div>
                                            @else
                                                <div class="badge badge-danger">{{ __('admin.Inactive') }}</div>
                                            @endif
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

@include('layouts.admin.includes.datatable')
