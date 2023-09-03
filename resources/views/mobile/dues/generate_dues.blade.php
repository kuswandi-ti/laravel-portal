@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Generate Dues') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <div class="card">
            <div class="card-body">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="generate_choice" id="per_month" value="per_month"
                        checked>
                    <label class="form-check-label" for="per_month">&nbsp;{{ __('Per Month') }}</label>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="generate_choice" id="per_user" value="per_user">
                    <label class="form-check-label" for="per_user">&nbsp;{{ __('Per User') }}</label>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2 mb-2 section">
        <div class="card card_per_month">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="month_per_month">{{ __('Month') }} <x-fill-field /></label>
                                <select class="form-control custom-select" name="month_per_month" id="month_per_month"
                                    required>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ date('n') == $i ? 'selected' : '' }}>
                                            {{ formatMonth($i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="year_per_month">{{ __('Year') }} <x-fill-field /></label>
                                <input type="text" class="form-control" name="year_per_month" id="year_per_month"
                                    value="{{ old('year_per_month') ?? date('Y') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card_per_user">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="mb-1 label" for="user">{{ __('User') }} <x-fill-field /></label>
                                <select class="form-control custom-select select2" name="user" id="user">
                                    <option value="" selected disabled>{{ __('Choose one ...') }}
                                    </option>
                                    @foreach ($users as $key => $value)
                                        <option value="{{ $key }}" {{ old('user') == $key ? 'selected' : '' }}>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="month_per_user">{{ __('Month') }} <x-fill-field /></label>
                                <select class="form-control custom-select" name="month_per_user" id="month_per_user"
                                    required>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ date('n') == $i ? 'selected' : '' }}>
                                            {{ formatMonth($i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="year_per_user">{{ __('Year') }} <x-fill-field /></label>
                                <input type="text" class="form-control" name="year_per_user" id="year_per_user"
                                    value="{{ old('year_per_user') ?? date('Y') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2 row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-block btn_process"
                    onclick="load_modal()">{{ __('Process') }}</button>
            </div>
        </div>

        <div class="modal fade dialogbox" id="dialog_confirm" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="help-outline" role="img" class="md hydrated" aria-label="alert"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Are you sure?') }}</h5>
                    </div>
                    <div class="modal-body">
                        {{ __("You won't be able to revert this!") }}
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </a>
                            <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal" id="btn-confirm">
                                {{ __('Yes') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.mobile.includes.toast')
@endsection

@include('layouts.admin.includes.select2')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.card_per_month').show()
            $('.card_per_user').hide()
        })

        $('#per_month').click(function() {
            $('.card_per_month').show()
            $('.card_per_user').hide()
        });

        $('#per_user').click(function() {
            $('.card_per_month').hide()
            $('.card_per_user').show()
        });

        function load_modal() {
            $('#btn-confirm').attr('onclick', 'confirm_generate()');
            $('#dialog_confirm').modal('show');
        }

        function confirm_generate() {
            let month = '';
            let year = '';
            let user_id = '';
            let choice = $('input[name="generate_choice"]:checked').val();

            if (choice == 'per_month') {
                month = $('#month_per_month option:selected').val();
                year = $('#year_per_month').val();
                user_id = '';
            } else {
                month = $('#month_per_user option:selected').val();
                year = $('#year_per_user').val();
                user_id = $('#user').val();
            }

            $('.btn_process').text("{{ __('Processing...') }}");
            $('.btn_process').prepend(
                '<span class="spinner-border spinner-border-sm me-05 spinner" role="status" aria-hidden="true"></span>'
            );
            $('.btn_process').attr('disabled', 'disabled');

            $.ajax({
                url: '{{ route('mobile.generate_dues.post') }}',
                type: 'post',
                data: {
                    '_method': 'post',
                    'choice': choice,
                    'month': month,
                    'year': year,
                    'user_id': user_id,
                },
                success: function(data) {
                    if (data.success == true) {
                        $('#toast_message_success').text(data.message);
                        toastbox('toast_success', 5000);
                    } else {
                        $('#toast_message_error').text(data.message);
                        toastbox('toast_error');
                    }
                },
                error: function(error) {
                    $('#toast_message_error').text(error.message);
                    toastbox('toast_error');
                },
                complete: function(data) {
                    $('.btn_process').text("{{ __('Process') }}");
                    $('.btn_process').find('.spinner').remove();
                    $('.btn_process').removeAttr('disabled');
                }
            });
        }
    </script>
@endpush
