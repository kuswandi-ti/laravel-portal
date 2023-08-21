@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Residence') }}
@endsection

@section('section_header_title')
    {{ __('admin.Residence') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Residence') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Residence') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about residence on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Residence') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.residence.create') }}" class="btn btn-primary">
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
                                    <th>{{ __('admin.Residence Name') }}</th>
                                    <th>{{ __('admin.Residence Address') }}</th>
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
                url: '{{ route('admin.residence.data') }}',
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
                data: 'name',
                searchable: true,
                sortable: true,
            }, {
                data: 'address',
                searchable: true,
                sortable: true,
            }, {
                data: 'status',
                searchable: true,
                sortable: true,
            }],
            columnDefs: [{
                className: 'text-center',
                targets: [0, 1, 4]
            }],
        });
    </script>
@endpush
