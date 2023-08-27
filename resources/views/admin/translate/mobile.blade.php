@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Translate Mobile Site') }}
@endsection

@section('section_header_title')
    {{ __('admin.Translate Mobile Site') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Translate Mobile Site') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Translate Mobile Site') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about translate mobile site on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Translate Mobile Site') }}</h4>
                    @if (canAccess(['language create']))
                        <div class="card-header-action">
                            <a href="{{ route('admin.language.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> {{ __('admin.Create') }}
                            </a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        @foreach ($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2"
                                    data-toggle="tab" href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                                    aria-selected="true">
                                    {{ $language->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content tab-bordered" id="myTab3Content">
                        @foreach ($languages as $language)
                            <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                                id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                                <div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                @if (canAccess(['translate mobile generate']))
                                                    <form method="POST"
                                                        action="{{ route('admin.translate.extract_localize_string') }}">
                                                        @csrf
                                                        <input type="hidden" name="directory"
                                                            value="{{ resource_path('views/mobile') }},{{ app_path('Http/Controllers/Mobile') }},{{ resource_path('views/layouts/mobile') }}">
                                                        <input type="hidden" name="language_code"
                                                            value="{{ $language->lang }}">
                                                        <input type="hidden" name="file_name" value="mobile">
                                                        <button type="submit"
                                                            class="mx-2 btn btn-primary">{{ __('admin.Generate Strings') }}</button>
                                                    </form>
                                                @endif
                                                @if (canAccess(['translate mobile trans']))
                                                    <form class="translate_form" method="POST" action="#">
                                                        <input type="hidden" name="language_code"
                                                            value="{{ $language->lang }}">
                                                        <input type="hidden" name="file_name" value="mobile">
                                                        <button type="submit"
                                                            class="mx-2 btn btn-dark translate-button">{{ __('admin.Translate Strings') }}</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-{{ $language->lang }}">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="12%"><i class="fas fa-cogs"></i></th>
                                                    <th>{{ __('admin.String') }}</th>
                                                    <th>{{ __('admin.Translation') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $translated_values = trans('mobile', [], $language->lang);
                                                @endphp

                                                @if (is_array($translated_values))
                                                    @foreach ($translated_values as $key => $value)
                                                        <tr>
                                                            <td class="text-center" width="12%">
                                                                @if (canAccess(['translate mobile update']))
                                                                    <button data-langcode="{{ $language->lang }}"
                                                                        data-key="{{ $key }}"
                                                                        data-value="{{ $value }}"
                                                                        data-filename="mobile" type="button"
                                                                        class="btn btn-primary btn-sm modal_btn trigger--fire-modal-1"
                                                                        data-toggle="modal" data-target="#exampleModal">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                            <td>{{ $key }}</td>
                                                            <td>{{ $value }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.Value') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.translate.update_languange_string') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('admin.Value') }}</label>
                            <input type="text" name="value" class="form-control" value="">
                            <input type="hidden" name="lang_code" class="form-control" value="">
                            <input type="hidden" name="key" class="form-control" value="">
                            <input type="hidden" name="file_name" class="form-control" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('admin.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('admin.Save changes') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.datatable')

@push('scripts')
    <script>
        @foreach ($languages as $language)
            $("#table-{{ $language->lang }}").DataTable({
                "columnDefs": [{
                    "sortable": false,
                }]
            });
        @endforeach

        $(document).ready(function() {
            $('body').on('click', '.modal_btn', function() {
                let langCode = $(this).data('langcode');
                let key = $(this).data('key');
                let value = $(this).data('value');
                let filename = $(this).data('filename');

                $('input[name="lang_code"]').val("")
                $('input[name="key"]').val("")
                $('input[name="value"]').val("")
                $('input[name="file_name"]').val("")

                $('input[name="lang_code"]').val(langCode)
                $('input[name="key"]').val(key)
                $('input[name="value"]').val(value)
                $('input[name="file_name"]').val(filename)

                $('#exampleModal').modal('show')
            })

            $('.translate_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.translate.translate_string') }}",
                    data: formData,
                    beforeSend: function() {
                        $('.translate-button').text(
                            "{{ __('admin.Translating Please Wait...') }}")
                        $('.translate-button').prop('disabled', true);
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Done!',
                                data.message,
                                'success'
                            ).then(() => {
                                window.location.reload();
                            });

                        } else {
                            Swal.fire(
                                'Error!',
                                data.message,
                                'error'
                            )
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            })
        })
    </script>
@endpush
