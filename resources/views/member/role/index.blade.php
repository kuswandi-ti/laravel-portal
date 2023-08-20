@extends('layouts.admin.master')

@section('page_title')
    {{ __('Role') }}
@endsection

@section('section_header_title')
    {{ __('Role') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Role') }}</div>
@endsection

@section('section_body_title')
    {{ __('Role') }}
@endsection

@section('section_body_lead')
    {{ __('View information about user role & permission on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All Roles') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.role.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('Create') }}
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
                                    <th>{{ __('Role Name') }}</th>
                                    <th class="text-center">{{ __('Guard Name') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row" class="text-center" width="10%">{{ $loop->iteration }}</th>
                                        <td class="text-center" width="12%">
                                            @if ($role->name != getGuardTextAdmin())
                                                <a href="{{ route('member.role.edit', $role->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('member.role.destroy', $role->id) }}"
                                                    class="btn btn-danger btn-sm delete_item"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            @else
                                                <div class="badge badge-danger">{{ __('No Action') }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $role->name }}</td>
                                        <td class="text-center">
                                            @if ($role->guard_name == getGuardNameMember())
                                                <div class="badge badge-danger">{{ $role->guard_name }}</div>
                                            @else
                                                <div class="badge badge-info">{{ $role->guard_name }}</div>
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
