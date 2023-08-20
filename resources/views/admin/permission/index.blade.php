@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Permission') }}
@endsection

@section('section_header_title')
    {{ __('admin.Permission') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Permission') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Permission') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about permission on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Permission') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">
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
                                    <th>{{ __('admin.Permission Name') }}</th>
                                    <th class="text-center">{{ __('admin.Guard Name') }}</th>
                                    <th>{{ __('admin.Group Name') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <th scope="row" class="text-center" width="10%">{{ $loop->iteration }}</th>
                                        <td class="text-center" width="12%">
                                            <a href="{{ route('admin.permission.edit', $permission->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.permission.destroy', $permission->id) }}"
                                                class="btn btn-danger btn-sm delete_item"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td class="text-center">
                                            @if ($permission->guard_name == 'admin')
                                                <div class="badge badge-danger">{{ $permission->guard_name }}</div>
                                            @else
                                                <div class="badge badge-primary">{{ $permission->guard_name }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $permission->group_name }}</td>
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
