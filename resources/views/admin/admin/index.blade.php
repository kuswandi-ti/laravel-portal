@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Admin User') }}
@endsection

@section('section_header_title')
    {{ __('admin.Admin User') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Admin User') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Admin User') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about admin user on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Admin User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('admin.Create') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="active-tab3" data-toggle="tab" href="#active3"
                                role="tab" aria-controls="active" aria-selected="true">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="inactive-tab3" data-toggle="tab" href="#inactive3" role="tab"
                                aria-controls="inactive" aria-selected="false">Inactive</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade active show" id="active3" role="tabpanel" aria-labelledby="active-tab3">
                            <div class="mt-3 table-responsive">
                                <table class="table table-striped" id="table_data_active">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="10%"><i class="fas fa-list-ol"></i></th>
                                            <th class="text-center" width="12%"><i class="fas fa-cogs"></i></th>
                                            <th></th>
                                            <th>{{ __('admin.Admin User Name') }}</th>
                                            <th class="text-center">{{ __('admin.Email') }}</th>
                                            <th class="text-center">{{ __('admin.Role') }}</th>
                                            <th class="text-center" width="8%">{{ __('admin.Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins_active as $admin)
                                            <tr>
                                                <th scope="row" class="text-center align-middle" width="10%">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="text-center align-middle" width="12%">
                                                    <a href="{{ route('admin.admin.edit', $admin->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.admin.destroy', $admin->id) }}"
                                                        class="btn btn-danger btn-sm delete_item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                                <td class="align-middle">
                                                    @if (!empty($admin->image))
                                                        <figure class="avatar">
                                                            <img
                                                                src="{{ url(config('common.path_image_store') . $admin->image) }}">
                                                        </figure>
                                                    @else
                                                        <img src="{{ url(config('common.no_image_square')) }}"
                                                            class="rounded-circle" width="35">
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $admin->name ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $admin->email ?? '' }}</td>
                                                <td class="text-center align-middle">
                                                    {{ $admin->roles->first()->name ?? '' }}</td>
                                                <td class="text-center align-middle" width="8%">
                                                    @if ($admin->status == 1)
                                                        <div class="badge badge-primary">{{ __('admin.Active') }}</div>
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
                        <div class="tab-pane fade" id="inactive3" role="tabpanel" aria-labelledby="inactive-tab3">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_data_inactive">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="10%"><i class="fas fa-list-ol"></i></th>
                                            <th class="text-center" width="12%"><i class="fas fa-cogs"></i></th>
                                            <th></th>
                                            <th>{{ __('admin.Admin User Name') }}</th>
                                            <th class="text-center">{{ __('admin.Email') }}</th>
                                            <th class="text-center">{{ __('admin.Role') }}</th>
                                            <th class="text-center" width="8%">{{ __('admin.Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins_inactive as $admin)
                                            <tr>
                                                <th scope="row" class="text-center align-middle" width="10%">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="text-center align-middle" width="12%">
                                                    <a href="{{ route('admin.admin.restore', $admin->id) }}"
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        title="Restore to Active"><i class="fas fa-undo"></i></a>
                                                </td>
                                                <td class="align-middle">
                                                    @if (!empty($admin->image))
                                                        <figure class="avatar">
                                                            <img
                                                                src="{{ url(config('common.path_image_store') . $admin->image) }}">
                                                        </figure>
                                                    @else
                                                        <img src="{{ url(config('common.no_image_square')) }}"
                                                            class="rounded-circle" width="35">
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $admin->name ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $admin->email ?? '' }}</td>
                                                <td class="text-center align-middle">
                                                    {{ $admin->roles->first()->name ?? '' }}</td>
                                                <td class="text-center align-middle" width="8%">
                                                    @if ($admin->status == 1)
                                                        <div class="badge badge-primary">{{ __('admin.Active') }}</div>
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
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.datatable')
