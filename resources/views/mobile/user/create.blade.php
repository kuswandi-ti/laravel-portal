@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Create User') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <form>
            <div class="card">
                <div class="card-body">
                    <div class="form-group boxed">
                        <label for="name">{{ __('Full Name') }} <x-fill-field /></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            placeholder="Enter your full name" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group boxed">
                        <label for="email">{{ __('Email') }} <x-fill-field /></label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Enter your email" required>
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
                            <option value="" selected>
                                {{ __('Choose one ...') }}</option>
                            @foreach ($houses as $house)
                                <option value="{{ $house->id }}" {{ old('house') == $house->id ? 'selected' : '' }}>
                                    {{ $house->block . ' - ' . $house->no . ', ' . $house->owner_name }}</option>
                            @endforeach
                        </select>
                        @error('house')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="password4">Password</label>
                            <input type="password" class="form-control" id="password4" autocomplete="off"
                                placeholder="Password Input">
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated"
                                    aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="phone4">Phone</label>
                            <input type="tel" class="form-control" id="phone4" placeholder="Phone Input">
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated"
                                    aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="textarea4">Textarea</label>
                            <textarea id="textarea4" rows="2" class="form-control" placeholder="Textarea"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated"
                                    aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-block">{{ __('Create') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
