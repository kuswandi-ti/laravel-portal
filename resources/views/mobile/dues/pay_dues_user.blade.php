@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Pay Dues') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    @if (count($dues) > 0)
        <div class="mt-2 section">
            <div class="transactions">
                <ul class="mt-1 mb-1 listview flush transparent no-line image-listview detailed-list">
                    <li>
                        <div class="item">
                            <div class="in">
                                <div>
                                    <strong class="text-danger" id="total">0</strong>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm me-1 btn_pay"
                                        onclick="load_modal()">{{ __('Pay Outstanding Dues') }}</button>
                                </div>
                                <div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="check_all" id="check_all"
                                            value="0">
                                        <label class="form-check-label" for="check_all">
                                            {{ __('Check All') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-2 section">
            @foreach ($dues as $year => $dues_list)
                <div class="section-title">{{ $year }}</div>
                <div class="transactions">
                    <ul class="mb-4 listview flush transparent no-line image-listview detailed-list">
                        @foreach ($dues_list as $due)
                            <li>
                                <div class="item">
                                    <div class="icon-box text-success">
                                        <ion-icon name="cash-outline" role="img" class="md hydrated"
                                            aria-label="cash-outline">
                                        </ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>
                                            <strong>{{ formatMonth($due['month']) }}</strong>
                                            <div class="text-small text-secondary">
                                                {{ __('Please checklist to pay for the month option') }}</div>
                                        </div>
                                        <div class="text-end">
                                            <strong>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input check_dues"
                                                        name="ids[]" id="{{ $due['id'] }}"
                                                        value="{{ $due['dues_amount'] }}" onClick="calculate(this);">
                                                    <label class="form-check-label" for="{{ $due['id'] }}">
                                                        <span class="p-1 badge badge-danger">
                                                            <strong>{{ formatAmount($due['dues_amount']) }}</strong>
                                                        </span>
                                                    </label>
                                                </div>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @else
        <div class="mt-2 section">
            <div class="transactions">
                <ul class="mb-4 listview flush transparent no-line image-listview detailed-list">
                    <li>
                        <div class="item">
                            <div class="icon-box text-secondary">
                                <ion-icon name="cash-outline" role="img" class="md hydrated" aria-label="cash-outline">
                                </ion-icon>
                            </div>
                            <div class="in">
                                <div>
                                    <strong>{{ __('Data is Empty') }}</strong>
                                    <div class="text-small text-secondary">
                                        {{ __('No data outstanding dues to displayed') }}</div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    @endif

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

    @include('layouts.mobile.includes.toast')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#total').hide()
            $('.btn_pay').hide()
        })

        var total_item = 0

        $("#check_all").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked)

            total_item = 0

            var checked_value = $("input[type='checkbox']:checked").map(function() {
                total_item = total_item + parseInt($(this).val())
            }).get()

            $('#total').text(formatAmount(total_item))

            if ($('#check_all').is(":checked")) {
                $('#total').show()
                $('.btn_pay').show()
            } else {
                $('#total').hide()
                $('.btn_pay').hide()
            }
        })

        function calculate(item) {
            if (item.checked) {
                total_item += parseInt(item.value)
            } else {
                total_item -= parseInt(item.value)
            }

            if (item.checked == false) {
                $("input[name='check_all']").prop('checked', false)
            }

            document.getElementById('total').innerHTML = formatAmount(total_item)

            if (total_item > 0) {
                $('#total').show()
                $('.btn_pay').show()
            } else {
                $('#total').hide()
                $('.btn_pay').hide()
            }
        }

        function load_modal() {
            $('#btn-confirm').attr('onclick', 'confirm_process()');
            $('#dialog_confirm').modal('show');
        }

        function confirm_process() {
            var ids = [];

            $('.check_dues:checked').each(function() {
                ids.push($(this).attr('id'));
            });

            if (ids.length > 0) {
                $('.btn_pay').text("{{ __('Processing...') }}");
                $('.btn_pay').prepend(
                    '<span class="spinner-border spinner-border-sm me-05 spinner" role="status" aria-hidden="true"></span>'
                );
                $('.btn_pay').attr('disabled', 'disabled');
            }

            $.ajax({
                url: '{{ route('mobile.pay_dues.post') }}',
                type: 'post',
                data: {
                    '_method': 'post',
                    ids: ids,
                },
                success: function(data) {
                    if (data.success == true) {
                        $('#toast_message_success').text(data.message);
                        toastbox('toast_success', 5000);
                        window.location.reload(true);
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
                    $('.btn_pay').text("{{ __('Pay') }}");
                    $('.btn_pay').find('.spinner').remove();
                    $('.btn_pay').removeAttr('disabled');
                }
            });
        }
    </script>
@endpush
