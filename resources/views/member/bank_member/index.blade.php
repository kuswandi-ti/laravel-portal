@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Cash & Bank') }}
@endsection

@section('section_header_title')
    {{ __('admin.Cash & Bank') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Cash & Bank') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Cash & Bank') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Restore information about cash & bank on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Cash & Bank') }}</h4>
                </div>
                <div class="card-body">
                    <div class="mt-3 table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%"><i class="fas fa-list-ol"></i></th>
                                    <th class="text-center" width="12%"><i class="fas fa-cogs"></i></th>
                                    <th class="text-center">{{ __('admin.Account Number') }}</th>
                                    <th>{{ __('admin.Account Name') }}</th>
                                    <th class="text-right">{{ __('admin.Beginning Balance') }}</th>
                                    <th class="text-center">{{ __('admin.Bank Code') }}</th>
                                    <th class="text-center">{{ __('admin.Bank Name') }}</th>
                                    <th class="text-center">{{ __('admin.Bank Type') }}</th>
                                    <th class="text-center">{{ __('admin.Email') }}</th>
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
                url: '{{ route('member.bank_member.data') }}',
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
                data: 'bank_account_number',
                searchable: false,
                sortable: false,
            }, {
                data: 'bank_account_name',
                searchable: true,
                sortable: true,
            }, {
                data: 'beginning_balance',
                searchable: true,
                sortable: true,
            }, {
                data: 'bank_code',
                searchable: true,
                sortable: true,
            }, {
                data: 'bank_name',
                searchable: true,
                sortable: true,
            }, {
                data: 'bank_type',
                searchable: true,
                sortable: true,
            }, {
                data: 'status',
                searchable: true,
                sortable: true,
            }],
            columnDefs: [{
                className: 'text-center',
                targets: [0, 1, 2, 4, 5, 6, 7, 8, 9]
            }, {
                className: 'text-right',
                targets: [3]
            }],
        });
    </script>
@endpush
