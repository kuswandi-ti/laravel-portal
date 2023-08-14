@extends('member.layouts.master')

@section('page_title')
    {{ __('Admin') }}
@endsection

@section('title')
    {{ __('Admin') }}
@endsection

@section('sub_title')
    {{ __('All application admin user on this page') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Admin') }}</li>
@endsection

@includeIf('includes.select2')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="nav-icon fas fa-user-cog"></i>&nbsp;
                        {{ __('All Admin User') }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('member.admin.create') }}" class="btn btn-primary">
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
                                    <th></th>
                                    <th>{{ __('Admin Name') }}</th>
                                    <th class="text-center">{{ __('Email') }}</th>
                                    <th class="text-center">{{ __('Phone') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th class="text-center">{{ __('Role') }}</th>
                                    <th class="text-center"><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td scope="row" class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">
                                            @if (!empty($member->image))
                                                <img src="{{ url(config('common.path_image_storage') . $member->image) }}"
                                                    class="img-circle" width="45">
                                            @else
                                                <img src="{{ url(config('common.no_image_circle')) }}" class="img-circle"
                                                    width="45">
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $member->name ?? '' }}</td>
                                        <td class="align-middle">{{ $member->email ?? '' }}</td>
                                        <td class="align-middle">{{ $member->phone ?? '' }}</td>
                                        <td class="align-middle">{{ $member->address ?? '' }}</td>
                                        <td class="align-middle">
                                            @if ($member->roles->first()->name != 'Admin')
                                                <div class="badge bg-info">{{ $member->roles->first()->name }}</div>
                                            @else
                                                <div class="badge bg-danger">{{ $member->roles->first()->name }}</div>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($member->roles->first()->name != 'Admin')
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
                                                            href="{{ route('member.admin.edit', $member->id) }}">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item delete_item"
                                                            href="{{ route('member.admin.destroy', $member->id) }}">{{ __('Delete') }}</a>
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
