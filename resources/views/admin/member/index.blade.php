@extends('admin.layouts.master')

@section('page_title')
    {{ __('Member User') }}
@endsection

@section('section_header_title')
    {{ __('Member User') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Member User') }}</div>
@endsection

@section('section_body_title')
    {{ __('Member User') }}
@endsection

@section('section_body_lead')
    {{ __('View information about member user on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All Member User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.member.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('Create') }}
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
                                            <th class="text-center"><i class="fas fa-list-ol"></i></th>
                                            <th></th>
                                            <th>{{ __('Member User Name') }}</th>
                                            <th class="text-center">{{ __('Email') }}</th>
                                            <th>{{ __('Role') }}</th>
                                            <th class="text-center">{{ __('Active') }}</th>
                                            <th class="text-center"><i class="fas fa-cogs"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members_active as $member)
                                            <tr>
                                                <th scope="row" class="text-center align-middle">{{ $loop->iteration }}
                                                </th>
                                                <td class="align-middle">
                                                    @if (!empty($member->image))
                                                        <figure class="avatar">
                                                            <img
                                                                src="{{ url(config('common.path_image_store') . $member->image) }}">
                                                        </figure>
                                                    @else
                                                        <img src="{{ url(config('common.no_image_square')) }}"
                                                            class="rounded-circle" width="35">
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $member->name ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $member->email ?? '' }}</td>
                                                <td class="align-middle">
                                                    @foreach ($member->roles as $item)
                                                        <span class="badge badge-secondary">{{ $item->name ?? '' }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if (empty($member->deleted_at))
                                                        <div class="badge badge-info">Active</div>
                                                    @else
                                                        <div class="badge badge-danger">Inactive</div>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('admin.member.edit', $member->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.member.destroy', $member->id) }}"
                                                        class="btn btn-danger btn-sm delete_item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="inactive3" role="tabpanel" aria-labelledby="inactive-tab3">
                            <div class="mt-3 table-responsive">
                                <table class="table table-striped" id="table_data_inactive">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><i class="fas fa-list-ol"></i></th>
                                            <th></th>
                                            <th>{{ __('Member User Name') }}</th>
                                            <th class="text-center">{{ __('Email') }}</th>
                                            <th>{{ __('Role') }}</th>
                                            <th class="text-center">{{ __('Active') }}</th>
                                            <th class="text-center"><i class="fas fa-cogs"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members_inactive as $member)
                                            <tr>
                                                <th scope="row" class="text-center align-middle">{{ $loop->iteration }}
                                                </th>
                                                <td class="align-middle">
                                                    @if (!empty($member->image))
                                                        <figure class="avatar">
                                                            <img
                                                                src="{{ url(config('common.path_image_store') . $member->image) }}">
                                                        </figure>
                                                    @else
                                                        <img src="{{ url(config('common.no_image_square')) }}"
                                                            class="rounded-circle" width="35">
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $member->name ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $member->email ?? '' }}</td>
                                                <td class="align-middle">
                                                    @foreach ($member->roles as $item)
                                                        <span class="badge badge-secondary">{{ $item->name ?? '' }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    @if (empty($member->deleted_at))
                                                        <div class="badge badge-info">Active</div>
                                                    @else
                                                        <div class="badge badge-danger">Inactive</div>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.member.restore', $member->id) }}"
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        title="Restore to Active"><i class="fas fa-undo"></i></a>
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

@include('admin.includes.datatable')
