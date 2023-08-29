@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Create Cash & Bank') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <x-alert-message />

        <form method="POST" action="{{ route('mobile.bank-member.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="bank_account_number">{{ __('Account Number') }}
                                <x-fill-field /></label>
                            <input type="text" class="form-control" name="bank_account_number" id="bank_account_number"
                                value="{{ old('bank_account_number') }}" placeholder="{{ __('Enter account number') }}"
                                required autofocus>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="bank_account_name">{{ __('Account Name') }}
                                <x-fill-field /></label>
                            <input type="text" class="form-control" name="bank_account_name" id="bank_account_name"
                                value="{{ old('bank_account_name') }}" placeholder="{{ __('Enter account name') }}"
                                required>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="beginning_balance">{{ __('Beginning Balance') }}
                                <x-fill-field /></label>
                            <input type="text" class="form-control" name="beginning_balance" id="beginning_balance"
                                value="{{ old('beginning_balance') ?? 0 }}" placeholder="{{ __('Enter account name') }}"
                                required>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <label class="mb-1 label" for="bank">{{ __('Bank') }} <x-fill-field /></label>
                        <select class="form-control custom-select select2" name="bank" id="bank" required>
                            <option value="" selected disabled>
                                {{ __('Choose one ...') }}</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}" {{ old('bank') == $bank->id ? 'selected' : '' }}
                                    data-code="{{ $bank->code }}" data-name="{{ $bank->name }}"
                                    data-type="{{ $bank->type }}">
                                    {{ $bank->name . ' - ' . $bank->code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="bank_code">{{ __('Bank Code') }}
                                        <x-fill-field /></label>
                                    <input type="text" class="form-control" name="bank_code" id="bank_code"
                                        value="{{ old('bank_code') }}" placeholder="{{ __('Auto') }}" required
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="bank_name">{{ __('Bank Name') }}
                                        <x-fill-field /></label>
                                    <input type="text" class="form-control" name="bank_name" id="bank_name"
                                        value="{{ old('bank_name') }}" placeholder="{{ __('Auto') }}" required
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="bank_type">{{ __('Bank Type') }}
                                        <x-fill-field /></label>
                                    <input type="text" class="form-control" name="bank_type" id="bank_type"
                                        value="{{ old('bank_type') }}" placeholder="{{ __('Auto') }}" required
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Create') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@include('layouts.admin.includes.select2')

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#beginning_balance").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            $('body').on('change', '#bank', function() {
                let code = $(':selected', this).data('code');
                let name = $(':selected', this).data('name');
                let type = $(':selected', this).data('type');

                $('input[name="bank_code"]').val("")
                $('input[name="bank_name"]').val("")
                $('input[name="bank_type"]').val("")

                $('input[name="bank_code"]').val(code)
                $('input[name="bank_name"]').val(name)
                $('input[name="bank_type"]').val(type)
            })
        });
    </script>
@endpush
