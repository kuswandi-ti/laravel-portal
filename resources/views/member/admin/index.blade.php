@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Member Admin') }}
@endsection

@section('section_header_title')
    {{ __('admin.Member Admin') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Member Admin') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Member Admin') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about member admin on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Member Admin') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('member.admin.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('admin.Create') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-3 table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%"><i class="fas fa-list-ol"></i></th>
                                    <th class="text-center" width="12%"><i class="fas fa-cogs"></i></th>
                                    <th class="text-center"></th>
                                    <th>{{ __('admin.Member Admin Name') }}</th>
                                    <th class="text-center">{{ __('admin.Email') }}</th>
                                    <th class="text-center">{{ __('admin.Role') }}</th>
                                    <th class="text-center" width="8%">{{ __('admin.Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
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

@push('scripts')
    <script>
        let table_data;

        table_data = $('#table_data').DataTable({
            processing: true,
            autoWidth: false,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '{{ route('member.admin.data') }}',
            },
            columns: [{
                data: 'DT_RowIndex',
                searchable: false,
                sortable: false,
            }, {
                data: 'action',
                searchable: false,
                sortable: false,
            }, {
                data: 'image',
                searchable: false,
                sortable: false,
            }, {
                data: 'name',
                searchable: true,
                sortable: true,
            }, {
                data: 'email',
                searchable: true,
                sortable: true,
            }, {
                data: 'role',
                searchable: true,
                sortable: true,
            }, {
                data: 'status',
                searchable: true,
                sortable: true,
            }],
            columnDefs: [{
                className: 'text-center',
                targets: [0, 1, 2, 4, 5, 6]
            }],
        });
    </script>
@endpush
