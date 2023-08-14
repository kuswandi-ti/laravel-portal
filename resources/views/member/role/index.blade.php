@extends('member.layouts.master')

@section('page_title')
    {{ __('Role') }}
@endsection

@section('title')
    {{ __('Role') }}
@endsection

@section('sub_title')
    {{ __('All application role on this page') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Role') }}</li>
@endsection

@includeIf('includes.select2')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="nav-icon fas fa-user-cog"></i>&nbsp;
                        {{ __('All Roles') }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('member.role.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('Create') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table_active">
                            <thead>
                                <tr>
                                    <th class="text-center"><i class="fas fa-list-ol"></i></th>
                                    <th>{{ __('Role Name') }}</th>
                                    <th class="text-center">{{ __('Guard') }}</th>
                                    <th class="text-center"><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $role->name ?? '' }}</td>
                                        <td class="text-center align-middle">
                                            @if ($role->guard_name == 'member')
                                                <div class="badge bg-danger">{{ $role->guard_name }}</div>
                                            @else
                                                <div class="badge bg-info">{{ $role->guard_name }}</div>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($role->name != 'Admin')
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-default">{{ __('Action') }}</button>
                                                    <button type="button"
                                                        class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only"></span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu" style="">
                                                        <a class="dropdown-item"
                                                            href="{{ route('member.role.edit', $role->id) }}">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item delete_item"
                                                            href="{{ route('member.role.destroy', $role->id) }}">{{ __('Delete') }}</a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="badge bg-danger">{{ __('No Action') }}</div>
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

@include('member.includes.datatable')
