@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Edit User') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <x-alert-message />

        <form method="POST" action="{{ route('mobile.user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="name">{{ __('Full Name') }} <x-fill-field /></label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') ?? $user->name }}" placeholder="{{ __('Enter your full name') }}"
                                required autofocus>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="email">{{ __('Email') }} <x-fill-field /></label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') ?? $user->email }}" placeholder="{{ __('Enter your email') }}"
                                required>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <label class="mb-1 label" for="house">{{ __('House') }} <x-fill-field /></label>
                        <select class="form-control custom-select select2" name="house" id="house" required>
                            <option value="" selected disabled>
                                {{ __('Choose one ...') }}</option>
                            @foreach ($houses as $house)
                                <option value="{{ $house->id }}" {{ $house->id == $user->house_id ? 'selected' : '' }}
                                    data-street="{{ $house->street }}" data-block="{{ $house->block }}"
                                    data-no="{{ $house->no }}">
                                    {{ $house->block . '/' . $house->no . ' - ' . $house->owner_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="street">{{ __('Street Name') }} <x-fill-field /></label>
                            <input type="text" class="form-control" name="street" id="street"
                                value="{{ old('street') ?? $user->house_street_name }}" placeholder="{{ __('Auto') }}"
                                required readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="block">{{ __('House Block') }} <x-fill-field /></label>
                                    <input type="text" class="form-control" name="block" id="block"
                                        value="{{ old('block') ?? $user->house_block }}" placeholder="{{ __('Auto') }}"
                                        required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="no">{{ __('House No') }} <x-fill-field /></label>
                                    <input type="text" class="form-control" name="no" id="no"
                                        value="{{ old('no') ?? $user->house_number }}" placeholder="{{ __('Auto') }}"
                                        required readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input" name="flag_dues" id="flag_dues" value="1"
                            {{ !empty($user->flag_dues) ? 'checked' : '' }}>
                        <label class="form-check-label" for="flag_dues">{{ __('Pay Dues ?') }}</label>
                    </div>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@include('layouts.admin.includes.select2')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '#house', function() {
                let street = $(':selected', this).data('street');
                let block = $(':selected', this).data('block');
                let no = $(':selected', this).data('no');

                $('input[name="street"]').val("")
                $('input[name="block"]').val("")
                $('input[name="no"]').val("")

                $('input[name="street"]').val(street)
                $('input[name="block"]').val(block)
                $('input[name="no"]').val(no)
            })
        })
    </script>
@endpush
