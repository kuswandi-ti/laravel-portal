@extends('admin.layouts.master')

@section('page_title')
    {{ __('Admin User') }}
@endsection

@section('section_header_title')
    {{ __('Admin User') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Admin User') }}</div>
@endsection

@section('section_body_title')
    {{ __('Admin User') }}
@endsection

@section('section_body_lead')
    {{ __('View information about admin user on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All Admin User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> {{ __('Create') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data">
                            <thead>
                                <tr>
                                    <th class="text-center"><i class="fas fa-list-ol"></i></th>
                                    <th></th>
                                    <th>{{ __('Admin User Name') }}</th>
                                    <th class="text-center">{{ __('Email') }}</th>
                                    <th class="text-center">{{ __('Role') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center"><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                        <td class="align-middle">
                                            @if (!empty($admin->image))
                                                <figure class="avatar">
                                                    <img src="{{ url(env('PATH_IMAGE_STORAGE') . $admin->image) }}">
                                                </figure>
                                            @else
                                                <img src="{{ url(env('NO_IMAGE_SQUARE')) }}" class="rounded-circle"
                                                    width="35">
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $admin->name ?? '' }}</td>
                                        <td class="text-center align-middle">{{ $admin->email ?? '' }}</td>
                                        <td class="text-center align-middle">{{ $admin->roles->first()->name ?? '' }}</td>
                                        <td class="text-center">
                                            @if ($admin->status == 1)
                                                <div class="badge badge-primary">Active</div>
                                            @else
                                                <div class="badge badge-danger">Inactive</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.admin.edit', $admin->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.admin.destroy', $admin->id) }}"
                                                class="btn btn-danger btn-sm delete_item"><i
                                                    class="fas fa-trash-alt"></i></a>
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

@push('scripts')
    <script>
        table = $("#table_data").DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
