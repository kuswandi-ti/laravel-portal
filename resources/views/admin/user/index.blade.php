@extends('admin.layouts.master')

@section('page_title')
    {{ __('General User') }}
@endsection

@section('section_header_title')
    {{ __('General User') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('General User') }}</div>
@endsection

@section('section_body_title')
    {{ __('General User') }}
@endsection

@section('section_body_lead')
    {{ __('View information about general user on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('All General User') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
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
                                    <th>{{ __('General User Name') }}</th>
                                    <th class="text-center">{{ __('Email') }}</th>
                                    <th class="text-center">{{ __('Role') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center"><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row" class="text-center align-middle">{{ $loop->iteration }}</th>
                                        <td class="align-middle">
                                            @if (!empty($user->image))
                                                <figure class="avatar">
                                                    <img src="{{ url(config('common.path_image_store') . $user->image) }}">
                                                </figure>
                                            @else
                                                <img src="{{ url(config('common.no_image_square')) }}"
                                                    class="rounded-circle" width="35">
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $user->name ?? '' }}</td>
                                        <td class="text-center align-middle">{{ $user->email ?? '' }}</td>
                                        <td class="text-center align-middle">{{ $user->roles->first()->name ?? '' }}</td>
                                        <td class="text-center">
                                            @if (empty($user->deleted_at))
                                                <div class="badge badge-primary">Active</div>
                                            @else
                                                <div class="badge badge-danger">Inactive</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.user.destroy', $user->id) }}"
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
