@extends('layouts.admin.master')

@section('page_title')
    {{ __('House') }}
@endsection

@section('section_header_title')
    {{ __('House') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('House') }}</div>
@endsection

@section('section_body_title')
    {{ __('House') }}
@endsection

@section('section_body_lead')
    {{ __('View information about house on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All House') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.house.create') }}" class="btn btn-primary">
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
                                            <th class="text-center" width="10%"><i class="fas fa-list-ol"></i></th>
                                            <th class="text-center" width="12%"><i class="fas fa-cogs"></i></th>
                                            <th>{{ __('House Owner Name') }}</th>
                                            <th class="text-center">{{ __('Street') }}</th>
                                            <th class="text-center">{{ __('Block') }}</th>
                                            <th class="text-center">{{ __('No') }}</th>
                                            <th>{{ __('Address Info') }}</th>
                                            <th class="text-center" width="8%">{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($houses_active as $house)
                                            <tr>
                                                <th scope="row" class="text-center align-middle" width="10%">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="text-center align-middle" width="12%">
                                                    <a href="{{ route('member.house.edit', $house->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('member.house.destroy', $house->id) }}"
                                                        class="btn btn-danger btn-sm delete_item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                                <td class="align-middle">{{ $house->owner_name ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $house->street ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $house->block ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $house->no ?? '' }}</td>
                                                <td class="align-middle">{{ $house->address_info ?? '' }}</td>
                                                <td class="text-center align-middle" width="8%">
                                                    @if ($house->status == 1)
                                                        <div class="badge badge-primary">{{ __('Active') }}</div>
                                                    @else
                                                        <div class="badge badge-danger">{{ __('Inactive') }}</div>
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
                                            <th>{{ __('House Owner Name') }}</th>
                                            <th class="text-center">{{ __('Street') }}</th>
                                            <th class="text-center">{{ __('Block') }}</th>
                                            <th class="text-center">{{ __('No') }}</th>
                                            <th>{{ __('Address Info') }}</th>
                                            <th class="text-center" width="8%">{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($houses_inactive as $house)
                                            <tr>
                                                <th scope="row" class="text-center align-middle" width="10%">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="text-center align-middle" width="12%">
                                                    <a href="{{ route('member.house.restore', $house->id) }}"
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        title="{{ __('Restore to Active') }}"><i
                                                            class="fas fa-undo"></i></a>
                                                </td>
                                                <td class="align-middle">{{ $house->owner_name ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $house->street ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $house->block ?? '' }}</td>
                                                <td class="text-center align-middle">{{ $house->no ?? '' }}</td>
                                                <td class="align-middle">{{ $house->address_info ?? '' }}</td>
                                                <td class="text-center align-middle" width="8%">
                                                    @if ($house->status == 1)
                                                        <div class="badge badge-primary">{{ __('Active') }}</div>
                                                    @else
                                                        <div class="badge badge-danger">{{ __('Inactive') }}</div>
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
