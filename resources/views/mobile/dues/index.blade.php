@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Generate Dues') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <x-alert-message />

        <form method="POST" action="#">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="block">{{ __('Month') }} <x-fill-field /></label>
                                    <select class="form-control custom-select" name="month" id="month" required>
                                        <option value="" selected disabled>
                                            {{ __('Choose one ...') }}</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ old('month') == $i ? 'selected' : '' }}>
                                                {{ formatMonth($i) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="year">{{ __('Year') }} <x-fill-field /></label>
                                    <input type="text" class="form-control" name="year" id="year"
                                        value="{{ old('year') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Process') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
