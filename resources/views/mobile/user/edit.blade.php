@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Edit User') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <form method="POST" action="{{ route('mobile.user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="form-group boxed">
                        <label for="name">{{ __('Full Name') }} <x-fill-field /></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') ?? $user->name }}" placeholder="Enter your full name" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group boxed">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') ?? $user->email }}" placeholder="Enter your email" required readonly>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group boxed">
                        <label for="house">{{ __('House') }} <x-fill-field /></label>
                        <select class="form-control @error('house') is-invalid @enderror" name="house" id="house"
                            required>
                            <option value="" selected disabled>
                                {{ __('Choose one ...') }}</option>
                            @foreach ($houses as $house)
                                <option value="{{ $house->id }}" {{ $house->id == $user->house_id ? 'selected' : '' }}
                                    data-street="{{ $house->street }}" data-block="{{ $house->block }}"
                                    data-no="{{ $house->no }}">
                                    {{ $house->block . '/' . $house->no . ' - ' . $house->owner_name }}</option>
                            @endforeach
                        </select>
                        @error('house')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group boxed">
                        <label for="street">{{ __('Street Name') }}</label>
                        <input type="text" name="street" id="street"
                            class="form-control @error('street') is-invalid @enderror"
                            value="{{ old('street') ?? $user->house_street_name }}" placeholder="{{ __('Auto') }}"
                            readonly>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group boxed">
                                <label for="block">{{ __('House Block') }}</label>
                                <input type="text" name="block" id="block"
                                    class="form-control @error('block') is-invalid @enderror"
                                    value="{{ old('block') ?? $user->house_block }}" placeholder="{{ __('Auto') }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group boxed">
                                <label for="no">{{ __('House No') }}</label>
                                <input type="text" name="no" id="no"
                                    class="form-control @error('no') is-invalid @enderror"
                                    value="{{ old('no') ?? $user->house_number }}" placeholder="{{ __('Auto') }}"
                                    readonly>
                            </div>
                        </div>
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
